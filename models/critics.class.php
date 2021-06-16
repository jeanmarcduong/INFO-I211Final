<?php
/**
 * Author: Jeanmarc Duong
 * Date: 5/2/2020
 * File: critics.class.php
 * Description:
 */

class Critics
{
    //private variables
    private $id, $firstName, $lastName, $company;

    //constructor
    public function __construct($firstName, $lastName, $company)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
    }

    //get id
    public function getId()
    {
        return $this->id;
    }

    //get first name
    public function getFirstName()
    {
        return $this->firstName;
    }


    //get last name
    public function getLastName()
    {
        return $this->lastName;
    }

    //get company
    public function getCompany()
    {
        return $this->company;
    }

    //set id
    public function setId($id)
    {
        $this->id = $id;
    }




}