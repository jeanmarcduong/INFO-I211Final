<?php
/**
 * Author: Jeanmarc Duong
 * Date: 4/23/2020
 * File: front_page_controller.class.php
 * Description:
 */

class FrontPageController
{
    //front page index
    public function index() {
        $view = new FrontPageIndex();
        $view->display();
    }
}