<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: restaurant_search.class.php
 * Description:
 */

class RestaurantSearch extends RestaurantIndexView
{
    /*
         * the displays accepts an array of restaurant objects and displays
         * them in a grid.
         */

    public function display($terms, $result)
    {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <h1 style="text-align: center"> Search Results for <i><?= $terms ?></i></h1>


        <!-- display all records in a grid -->
        <div class="grid-container">
            <?php
            if ($result === 0) {
                echo "No restaurants was found.<br><br><br><br><br>";
            } else {
                //display restaurants in a grid; 5 restaurants per row
                foreach ($result as $i => $restaurant) {
                    $id = $restaurant->getId();
                    $name = $restaurant->getName();
                    $phone = $restaurant->getPhoneNumber();
                    $address = $restaurant->getAddress();
                    $hours = $restaurant->getHoursOfOperation();
                    $famous_dish = $restaurant->getFamousDish();

                    if ($i % 5 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/restaurant/detail/$id'><span>Name: $name<br>Phone: $phone<br>Address: $address <br> </span></a></p></div>";
                    ?>
                    <?php
                    if ($i % 5 == 4 || $i == count($result) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}