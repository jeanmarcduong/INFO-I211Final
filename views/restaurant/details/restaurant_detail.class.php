<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_detail.class.php
 * Description: Shows the details of the restaurant
 */

class RestaurantDetail extends RestaurantIndexView
{
    public function display($restaurant, $confirm = "")
    {
        //display page header
        parent::displayHeader("Details");
        $id = $restaurant->getId();
        $name = $restaurant->getName();
        $phone = $restaurant->getPhoneNumber();
        $address = $restaurant->getAddress();
        $hours = $restaurant->getHoursOfOperation();
        $famous_dish = $restaurant->getFamousDish();
        ?>
        <h1 style="text-align: center">Restaurant Details</h1>
        <div style="text-align: center">
            <p>Name: <?= $name ?></p>
            <p>Phone Number: <?= $phone ?></p>
            <p>Address: <?= $address ?></p>
            <p>Hours: <?= $hours ?></p>
            <p>Famous Dish: <?= $famous_dish ?></p>
        </div>
        <input type="button" id="edit-button" value="   Edit   "
               onclick="window.location.href = '<?= BASE_URL ?>/restaurant/edit/<?= $id ?>'">
        <p><?= $confirm ?></p>
        <br><br><br><br>
        <a href="<?= BASE_URL ?>/restaurant/index">Go to Restaurant List</a>
        <?php
        //display page footer
        parent::displayFooter();
    }
}