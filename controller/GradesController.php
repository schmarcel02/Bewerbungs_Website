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
        View::displayView("grades");
    }

    public function getGrades()
    {
        Util::setErrorLoc("default/home");
        Util::requirePermission(0, 3, 4);
        $sem = Util::requireParameter(0);
        header('Content-type: text/html; charset=utf8_unicode_ci');
        RootPath::root_include("public/data/grades/sem_$sem.html");
    }
}