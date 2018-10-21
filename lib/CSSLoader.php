<?php
/**
 * Created by PhpStorm.
 * User: mschm
 * Date: 10.09.2018
 * Time: 14:26
 */

class CSSLoader
{
    public static function loadByName($name)
    {
        $file = "/css/" . $name . '.css';
        echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';
    }
}