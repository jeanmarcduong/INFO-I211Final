<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restraurant_confirm.class.php
 * Description:
 */

class RestaurantConfirm extends RestaurantIndexView
{
    /*
         * the displays accepts an array of movie objects and displays
         * them in a grid.
         */

    public function display($result)
    {
        //display page header
        parent::displayHeader("Confirmation");
        ?>



            <?php
            //Dependent on the results that come back
            if (!$result) {
                echo "<h1 style='text-align: center'>There was an error registering the restaurant. Try again!</h1>";
            } else {
                echo "<h1 style='text-align: center'>You have successfully added a restaurant in.</h1>";
            }
            ?>

        <br><br><br><br>






        <?php
        //display page footer
        parent::displayFooter();
    }
}