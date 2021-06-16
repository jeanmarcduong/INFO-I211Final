<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_controller.class.php
 * Description:
 */

class RestaurantController
{
    private $restaurant_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the RestaurantModel class
        $this->restaurant_model = RestaurantModel::getRestaurantModel();
    }

    //index action that displays all restaurants
    public function index()
    {
        //retrieve all the restaurants and store them in an array
        $restaurant = $this->restaurant_model->list_restaurant();

        if (!$restaurant) {
            //display an error
            $message = "There was a problem displaying restaurants.";
            $this->error($message);
            return;
        }

        // display all restaurants
        $view = new RestaurantIndex();
        $view->display($restaurant);
    }

    //show details of a restaurant
    public function detail($id)
    {
        //retrieve the specific restaurant
        $restaurant = $this->restaurant_model->view_restaurant($id);

        if (!$restaurant) {
            //display an error
            $message = "There was a problem displaying the restaurant id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display restaurant details
        $view = new RestaurantDetail();
        $view->display($restaurant);
    }

    //display a restaurant in a form for editing
    public function edit($id)
    {
        //retrieve the specific restaurant
        $restaurant = $this->restaurant_model->view_restaurant($id);

        if (!$restaurant) {
            //display an error
            $message = "There was a problem displaying the restaurant id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new RestaurantEdit();
        $view->display($restaurant);
    }


    //update a restaurant in the database
    public function update($id)
    {
        //update the movie
        $update = $this->restaurant_model->update_restaurant($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the restaurant id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display that the restaurant has been updated
        $confirm = "The restaurant was successfully updated.";
        $restaurant = $this->restaurant_model->view_restaurant($id);

        $view = new RestaurantDetail();
        $view->display($restaurant, $confirm);
    }


    //search restaurants
    public function search()
    {
        //retrieve terms from search form
        $terms = trim($_POST['terms']);

        //if search term is empty, list all restaurants
        if ($terms == "") {
            $this->index();
        }

        //search the database for matching movies
        $restaurants = $this->restaurant_model->search_restaurant($terms);

        if ($restaurants === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched restaurants
        $search = new RestaurantSearch();
        $search->display($terms, $restaurants);
    }

    public function add()
    {


        $view = new RestaurantAdd;
        $view->display();

    }


    public function confirm()
    {
        $register = $this->restaurant_model->add_restaurant();

        if (!$register) {
            $message = "There was a problem adding restaurant.";
            $this->error($message);
            return;
        }

        $view = new RestaurantConfirm;
        $view->display($register);

    }

    //handle an error
    public function error($message)
    {
        //create an object of the Error class
        $error = new RestaurantError();

        //display the error page
        $error->display($message);
    }

    //autosuggestion
    public function suggest($terms)
    {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $restaurants = $this->restaurant_model->search_restaurant($query_terms);

        //retrieve all restaurant titles and store them in an array
        $titles = array();
        if ($restaurants) {
            foreach ($restaurants as $restaurant) {
                $titles[] = $restaurant->getName();
            }
        }
        echo json_encode($titles);
    }


}