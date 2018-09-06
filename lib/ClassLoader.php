<?php
require_once "../lib/RootPath.php";

class ClassLoader
{
    private static $classes = array(
        "Util" => "controller/util/",
        "UserUtil" => "controller/util/",
        "TextUtil" => "controller/util/",
        "Errors" => "lib/",
        "Repository" => "lib/",
        "View" => "lib/",
        "Settings" => "public/css/",
        "GalleryRepository" => "repository/",
        "ImageRepository" => "repository/",
        "UserRepository" => "repository/",
        "TextRepository" => "repository/",
    );

    public static function load($path, $class_name)
    {
        RootPath::root_require_once($path . $class_name . '.php');
        $class = new $class_name();
        if (method_exists($class, '__init__')) {
            $class->__init__();
        }
    }

    public static function loadByName($name)
    {
        self::load(self::$classes[$name], $name);
    }
}