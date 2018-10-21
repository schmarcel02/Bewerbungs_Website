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
        $view = new View("about/cv");
        $view->display();
    }

    public function certificates()
    {
        Util::requirePermission(0, 3, 4);
        View::displayView("about/certificates");
    }

    public function getCertificate()
    {
        if (!Util::hasPermission(0, 3, 4) || !$s = Util::getParameter(0)) {
            http_response_code(403);
            die();
        }

        $name = "";
        if ($s == 1)
            $name = "sap";
        if ($s == 2)
            $name = "abap";
        if ($s == 3)
            $name = "abacus";

        $sImage = RootPath::getRootPath("view/about/" . $name . "_certificate.jpg");
        header("Content-Type: image/jpeg");
        header("Content-Length: " . (string)(filesize($sImage)));

        echo file_get_contents($sImage);
    }
}