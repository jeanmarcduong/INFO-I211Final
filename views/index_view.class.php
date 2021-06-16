<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: index_view.class.php
 * Description:
 */

class IndexView
{
//this method displays the page header
    static public function displayHeader($page_title) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo $page_title ?></title>
            <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/www/css/style.css" />
            <script>
                    var media = "restaurant";
                    var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
        <body>
        <h1 style="text-align: center; font-family: Arial; font-size: 75px">Local Indy Restaurants</h1>

        <div class="navbar">
            <a href="<?= BASE_URL ?>">Home</a>
            <a href="<?= BASE_URL ?>/restaurant/index">Restaurants</a>
            <a href="<?= BASE_URL ?>/restaurant/add">Add Restaurants</a>
            <a href="<?= BASE_URL ?>/critics/index">Critics</a>
            <div class="search-container">
                <form action="<?= BASE_URL ?>/restaurant/search" method="post">
                    <input type="text" name="terms" id="searchBox" onkeyup="handleKeyUp(event)" />&nbsp;&nbsp;
                    <input type="submit"/>
                </form>
                <div id="suggestionDiv"></div>
            </div>
        </div>

        <?php
    }//end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <div id="footer">
            <hr>
            <p style="text-align: center">&copy; Foodie Cuisinie</p>
            <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax.js"></script>
        </div>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
