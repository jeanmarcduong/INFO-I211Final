<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_edit.class.php
 * Description: Edits the details of the restaurant
 * I CALL THIS AN ADVANCED FEATURE
 */

class RestaurantEdit extends RestaurantIndexView
{
    public function display($restaurant)
    {
        //display page header
        parent::displayHeader("Edit");
        $id = $restaurant->getId();
        $name = $restaurant->getName();
        $phone = $restaurant->getPhoneNumber();
        $address = $restaurant->getAddress();
        $hours = $restaurant->getHoursOfOperation();
        $famous_dish = $restaurant->getFamousDish();
        ?>

        <h1 style="text-align: center">Edit Restaurant Details</h1>

        <!-- display restaurant details in a form -->
        <form action='<?= BASE_URL . "/restaurant/update/" . $id ?>' method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <p>Title<br>
                <input name="name" type="text" size="75" value="<?= $name ?>" required autofocus></p>

            <p>Phone: <input name="phone" type="text" value="<?= $phone ?>" required=""></p>
            <p>Address: <br>
                <input name="address" type="text" size="40" value="<?= $address ?>" required=""></p>


            <p>Hours:<br>
                <textarea name="hours" rows="8" cols="100"><?= $hours ?></textarea></p>
            <p>Famous Dish: <br>
                <input name="famous_dish" type="text" size="40" value="<?= $famous_dish ?>" required=""></p>
            <input type="submit" name="action" value="Update Restaurant">
            <input type="button" value="Cancel"
                   onclick='window.location.href = "<?= BASE_URL . "/restaurant/detail/" . $id ?>"'>
        </form>


        <?php
        //display page footer
        parent::displayFooter();
    }
}