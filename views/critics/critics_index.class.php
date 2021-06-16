<?php
/**
 * Author: Jeanmarc Duong
 * Date: 5/2/2020
 * File: critics_index.class.php
 * Description:
 */

class CriticsIndex extends IndexView
{
    public function display($result)
    {
        //display page header
        parent::displayHeader("Critics");
        ?>
        <h3 style="text-align: center">List of Critics</h3>

        <div class="grid-container">
            <?php
            if ($result === 0) {
                echo "No Critic was found.<br><br><br><br><br>";
            } else {
                //display critics in a grid; 5 critics per row
                foreach ($result as $i => $critic) {
                    $id = $critic->getId();
                    $firstName = $critic->getFirstName();
                    $lastName = $critic->getLastName();
                    $company = $critic->getCompany();

                    if ($i % 5 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a><span>First Name: $firstName<br>Last Name: $lastName<br>Company: $company <br> </span></a></p></div>";
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