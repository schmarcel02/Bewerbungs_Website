<?php
/**
 * Created by PhpStorm.
 * User: mschm
 * Date: 2018-10-21
 * Time: 11:27
 */

class ProjectController
{
    public function index()
    {
        Util::location("project/overview");
    }

    public function overview()
    {
        View::displayView("project/overview");
    }

    public function details()
    {
        Util::setErrorLoc("/project/overview");
        $s = Util::requireParameter(0);

        $name = "";
        if ($s == 1)
            $name = "library";
        if ($s == 2)
            $name = "bewerbung";
        $sImage = RootPath::getRootPath("view/project/" . $name . ".pdf");
        header("Content-Type: 	application/pdf");
        header("Content-Length: " . (string)(filesize($sImage)));

        echo file_get_contents($sImage);
    }
}