<?php
/**
 * Created by PhpStorm.
 * User: mschm
 * Date: 03.08.2018
 * Time: 14:59
 */

class GradesController
{
    public function index()
    {
        Util::location("grades/view");
    }

    public function view()
    {
        Util::requirePermission(0, 3, 4);
        View::displayView("grades/view");
    }

    public function getGrades()
    {
        if (!Util::hasPermission(0, 3, 4) || !$s = Util::getParameter(0)) {
            http_response_code(403);
            die();
        }

        $name = "";
        if ($s == 1)
            $name = "bwd";
        if ($s == 2)
            $name = "gibb";
        $sImage = RootPath::getRootPath("view/grades/" . $name . "_flipped.jpg");
        header("Content-Type: image/jpeg");
        header("Content-Length: " . (string)(filesize($sImage)));

        echo file_get_contents($sImage);
    }
}