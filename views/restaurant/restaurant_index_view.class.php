<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_index_view.class.php
 * Description: index view class for the restaurants just in case
 */

class RestaurantIndexView extends IndexView
{
    public static function displayHeader($title)
    {
        parent::displayHeader($title)
        ?>






        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();
    }
}