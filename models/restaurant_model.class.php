<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/22/2020
 * File: restaurant_model.class.php
 * Description:
 */

class RestaurantModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUser;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getRestaurantModel method must be called.
    private function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

    }

    //static method to ensure there is just one RestaurantModel instance
    public static function getRestaurantModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new RestaurantModel();
        }
        return self::$_instance;
    }

    /*
     * the list_restaurant method retrieves all movies from the database and
     * returns an array of Restaurant objects if successful or false if failed.
     * Restaurant should also be filtered by categories and/or sorted by titles or category if they are available.
     */

    public function list_restaurant()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblUser;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no restaurant was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned restaurants
        $restaurants = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $restaurant = new Restaurant(stripslashes($obj->name), stripslashes($obj->phone_number), stripslashes($obj->address), stripslashes($obj->hours_of_operation), stripslashes($obj->famous_dish));

            //set the id for the restaurant
            $restaurant->setId($obj->id);

            //add the restaurant into the array
            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }

    /*
     * the view_restaurant method retrieves the details of the restaurant specified by its id
     * and returns a restaurant object. Return false if failed.
     */

    public function view_restaurant($id)
    {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblUser .
            " WHERE " . $this->tblUser . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a restaurant object
            $restaurant = new Restaurant(stripslashes($obj->name), stripslashes($obj->phone_number), stripslashes($obj->address), stripslashes($obj->hours_of_operation), stripslashes($obj->famous_dish));

            //set the id for the restaurant
            $restaurant->setId($obj->id);

            return $restaurant;
        }

        return false;
    }


    public function search_restaurant($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for search
        $sql = "SELECT * FROM " . $this->tblUser .
            " WHERE ";

        foreach ($terms as $term) {
            $sql .= "  name LIKE '%" . $term . "%' AND";
        }

        //Takes out the extra AND at the end of the sql statement
        $sql = rtrim($sql, "AND ");

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no restaurant was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 movie found.
        //create an array to store all the returned restaurants
        $restaurants = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $restaurant = new Restaurant(stripslashes($obj->name), stripslashes($obj->phone_number), stripslashes($obj->address), stripslashes($obj->hours_of_operation), stripslashes($obj->famous_dish));

            //set the id for the restaurant
            $restaurant->setId($obj->id);

            //add the restaurant into the array
            $restaurants[] = $restaurant;
        }
        return $restaurants;
    }

//the update_restaurant method updates an existing restaurant in the database. Details of the restaurant are posted in a form. Return true if succeed; false otherwise.
    public function update_restaurant($id)
    {
        //if the script did not received post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'name') ||
            !filter_has_var(INPUT_POST, 'phone') ||
            !filter_has_var(INPUT_POST, 'address') ||
            !filter_has_var(INPUT_POST, 'hours') ||
            !filter_has_var(INPUT_POST, 'famous_dish')) {

            return false;
        }

        //retrieve data for the new restaurant; data are sanitized and escaped for security.
        $name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)));
        $phone = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)));
        $address = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'address', FILTER_DEFAULT));
        $hours = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'hours', FILTER_SANITIZE_STRING)));
        $famous_dish = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'famous_dish', FILTER_SANITIZE_STRING)));

        try {
            //ensure name is not empty
            if ($name == "") {
                throw new RequiredValueException("Fatal Error:<br> Name is missing.<br>");
            }

            //ensure phone is not empty
            if ($phone == "") {
                throw new RequiredValueException("Fatal Error:<br> Phone is missing.<br>");
            }

            //ensure address is not empty
            if ($address == "") {
                throw new RequiredValueException("Fatal Error:<br> Address is missing.<br>");
            }

            //ensure hours is not empty
            if ($hours == "") {
                throw new RequiredValueException("Fatal Error:<br> Hours is missing.<br>");
            }

            //ensure famous dish is not empty
            if ($famous_dish == "") {
                throw new RequiredValueException("Fatal Error:<br> Famous Dish is missing.<br>");
            }
        }
        catch(RequiredValueException $e){
            $message = $e->getMessage();
        }

        //query string for update
        $sql = "UPDATE " . $this->tblUser .
            " SET name='$name', phone_number='$phone', address='$address', hours_of_operation='$hours', 
             famous_dish='$famous_dish' WHERE id='$id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }

    //add restaurant function
    public function add_restaurant() {
        //if the script did not received post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'name') ||
            !filter_has_var(INPUT_POST, 'phone') ||
            !filter_has_var(INPUT_POST, 'address') ||
            !filter_has_var(INPUT_POST, 'hours') ||
            !filter_has_var(INPUT_POST, 'famous_dish')) {

            return false;
        }



        //retrieve data for the new restaurant; data are sanitized and escaped for security.
        $name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)));
        $phone = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)));
        $address = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'address', FILTER_DEFAULT));
        $hours = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'hours', FILTER_SANITIZE_STRING)));
        $famous_dish = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'famous_dish', FILTER_SANITIZE_STRING)));


        try {
            //ensure name is not empty
            if ($name == "") {
                throw new RequiredValueException("Fatal Error:<br> Name is missing.<br>");
            }

            //ensure phone is not empty
            if ($phone == "") {
                throw new RequiredValueException("Fatal Error:<br> Phone is missing.<br>");
            }

            //ensure address is not empty
            if ($address == "") {
                throw new RequiredValueException("Fatal Error:<br> Address is missing.<br>");
            }

            //ensure hours is not empty
            if ($hours == "") {
                throw new RequiredValueException("Fatal Error:<br> Hours is missing.<br>");
            }

            //ensure famous dish is not empty
            if ($famous_dish == "") {
                throw new RequiredValueException("Fatal Error:<br> Famous Dish is missing.<br>");
            }
        }
        catch(RequiredValueException $e){
            $message = $e->getMessage();
        }

        //add the details of the user to the database
        $sql = "INSERT INTO restaurants VALUES (NULL, '$name', '$phone', '$address', '$hours', '$famous_dish')";

        //execute the insert query
        $query = $this->dbConnection->query($sql);

        //if insert query fails, return false
        if (!$query) {
            return false;
        }
        //If successful return true
        return true;
    }

}