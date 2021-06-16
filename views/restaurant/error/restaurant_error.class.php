<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_error.class.php
 * Description: shows errors
 */

class RestaurantError extends RestaurantIndexView
{
    public static function display($message)
    {
        parent::displayHeader("Error")
        ?>


        <h1 style="text-align: center">Error</h1>
        <hr>
        <h3> Sorry, but an error has occurred.</h3>
        <div style="color: red">
            <?= urldecode($message) ?>
        </div>

        <br><br><br><br>
        <hr>
        <a href="<?= BASE_URL ?>/restaurant/index">Back to the list</a>

        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();
    }
}