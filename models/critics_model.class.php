<?php
/**
 * Author: Jeanmarc Duong
 * Date: 5/2/2020
 * File: critics_model.class.php
 * Description:
 */

class CriticsModel
{

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCritics;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getRestaurantModel method must be called.
    private function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCritics = $this->db->getCriticsTable();


        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

    }

    //static method to ensure there is just one CriticsModel instance
    public static function getCriticsModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CriticsModel();
        }
        return self::$_instance;
    }

    public function list_critics()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblCritics;

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no critic was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned critics
        $critics = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {
            $critic = new Critics(stripslashes($obj->firstName), stripslashes($obj->lastName), stripslashes($obj->company));

            //set the id for the critic
            $critic->setId($obj->id);

            //add the critic into the array
            $critics[] = $critic;
        }
        return $critics;
    }


}