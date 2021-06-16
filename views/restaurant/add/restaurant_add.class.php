<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_add.class.php
 * Description:
 */

class RestaurantAdd extends RestaurantIndexView
{

    public function display()
    {
        //display page header
        parent::displayHeader("Add");

        ?>

        <h1 style="text-align: center">Add Restaurant </h1>

        <!-- display restaurant details in a form -->
        <form action='<?= BASE_URL . "/restaurant/confirm" ?>' method="post">
            <p>Title<br>
                <input name="name" type="text" size="75" placeholder="Add Name" required autofocus></p>

            <p>Phone: <input name="phone" type="text" placeholder="Add Phone Number" required=""></p>
            <p>Address: <br>
                <input name="address" type="text" size="40" placeholder="Add Address" required=""></p>

            <p>Hours:<br>
                <textarea name="hours" rows="8" cols="100" placeholder="Add Hours" ></textarea></p>
            <p>Famous Dish: <br>
                <input name="famous_dish" type="text" size="40" placeholder="Add Famous Dish" required=""></p>
            <input type="submit" name="action" value="Add Restaurant">
            <input type="button" value="Cancel"
                   onclick='window.location.href = "<?= BASE_URL?>"'>
        </form>


        <?php
        //display page footer
        parent::displayFooter();
    }
}