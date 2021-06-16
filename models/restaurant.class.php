<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/22/2020
 * File: restaurant.class.php
 * Description:
 */

class Restaurant
{
    //private variables
    private $id, $name, $phone_number, $address, $hours_of_operation, $famous_dish;


    //constructor
    public function __construct($name, $phone_number, $address, $hours_of_operation, $famous_dish)
    {

        $this->name = $name;
        $this->phone_number = $phone_number;
        $this->address = $address;
        $this->hours_of_operation = $hours_of_operation;
        $this->famous_dish = $famous_dish;
    }

    //get id of restaurant
    public function getId()
    {
        return $this->id;
    }

    //get name of restaurant
    public function getName()
    {
        return $this->name;
    }


    //get phone number of restaurant
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }


    //get address of restaurant
    public function getAddress()
    {
        return $this->address;
    }


    //get hours of restaurant
    public function getHoursOfOperation()
    {
        return $this->hours_of_operation;
    }


    //get famous dish of restaurant
    public function getFamousDish()
    {
        return $this->famous_dish;
    }


    //set id for restaurant
    public function setId($id)
    {
        $this->id = $id;
    }

}