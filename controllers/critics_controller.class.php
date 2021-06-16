<?php
/**
 * Author: Jeanmarc Duong
 * Date: 5/2/2020
 * File: critics_controller.class.php
 * Description:
 */

class CriticsController
{
    private $critics_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the CriticsModel class
        $this->critics_model = CriticsModel::getCriticsModel();
    }

    //index action that displays all critics
    public function index()
    {
        //retrieve all the critics and store them in an array
        $critic = $this->critics_model->list_critics();

        if (!$critic) {
            //display an error
            $message = "There was a problem displaying critics.";
            $this->error($message);
            return;
        }

        // display all critics
        $view = new CriticsIndex();
        $view->display($critic);
    }

    //handle an error
    public function error($message)
    {
        //create an object of the Error class
        $error = new RestaurantError();

        //display the error page
        $error->display($message);
    }


}