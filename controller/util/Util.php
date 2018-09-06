<?php

class Util
{
    private static $genericErrorLoc = "/";

    public static function setErrorLoc($loc)
    {
        self::$genericErrorLoc = $loc;
    }

    public static function error($error)
    {
        self::errorLocation(self::$genericErrorLoc, $error);
    }

    public static function errorLocation($location, $error)
    {
        self::location($location . "?error=$error");
        die();
    }

    public static function location($location)
    {
        header("Location: /$location");
    }

    public static function getParameter($par)
    {
        return isset($GLOBALS['parameter' . $par]) && $GLOBALS['parameter' . $par] != "" ? $GLOBALS['parameter' . $par] : false;
    }

    public static function getPost($key)
    {
        return isset($_POST[$key]) && $_POST[$key] != "" ? $_POST[$key] : false;
    }

    public static function getFile($key)
    {
        return isset($_FILES[$key]) && $_FILES[$key]['name'] != "" ? $_FILES[$key] : false;
    }

    public static function requireParameter($par)
    {
        if (!($parameter = self::getParameter($par)))
            self::errorLocation(self::$genericErrorLoc, "-param");
        return $parameter;
    }

    public static function requirePost($name)
    {
        if (!($post = self::getPost($name)))
            self::errorLocation(self::$genericErrorLoc, "-post");
        return $post;
    }

    public static function requireFile($name)
    {
        if (!($file = self::getParameter($name)))
            self::errorLocation(self::$genericErrorLoc, "-file");
        return $file;
    }

    public static function isLoggedIn()
    {
        return isset($_SESSION['uid']) ? $_SESSION['uid'] : false;
    }

    public static function requireLoggedIn()
    {
        if (!($uid = self::isLoggedIn()))
            self::errorLocation("user/login", "!login");
        return $uid;
    }

    public static function hasPermission(...$permissions)
    {
        self::requireLoggedIn();
        foreach ($permissions as $p) {
            if ($p == $_SESSION['permission'])
                return true;
        }
        return false;
    }

    public static function requirePermission(...$permissions)
    {
        if (!self::hasPermission(...$permissions))
            self::errorLocation("default/home", "!permission");
        return true;
    }
}