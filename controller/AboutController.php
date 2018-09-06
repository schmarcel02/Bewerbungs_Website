<?php
/**
 * Created by PhpStorm.
 * User: mschm
 * Date: 09.08.2018
 * Time: 16:25
 */

class AboutController
{
    public function index()
    {
        Util::location("about/overview");
    }

    public function overview()
    {
        $view = new View("about/overview");
        $view->display();
    }

    public function cv()
    {
        Util::requirePermission(0, 3, 4);
        header('Content-type: text/html; charset=utf8_unicode_ci');
        $view = new View("about/cv");
        $view->display();
    }
}