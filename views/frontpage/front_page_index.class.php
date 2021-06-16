<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: front_page_index.class.php
 * Description: shows the front page
 */

class FrontPageIndex extends IndexView
{
    public function display() {
        //display page header
        parent::displayHeader("Front Page");
        ?>



        <br><br><br><br>


<h3 id='frontpage' style="text-align: center"> Welcome to the front page of our website! Here you will find local Indy restaurants as well as their famous foods and hours
 of operations! Feel free to use the search bar to see a restaurant in particular. You will also find critics who have used our site to find a place to rate!</h3>

    <br><br><br><br>
        <img src="<?= BASE_URL ?>/www/img/restaurant.jpg" id="frontpic" title="restaurant"/>

        <?php
        //display page footer
        parent::displayFooter();
    }
}