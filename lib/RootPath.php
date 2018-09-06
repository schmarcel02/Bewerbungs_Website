<?php

//Diese Klasse stammt von mir
class RootPath
{
    public static function getRootPath($path)
    {
        return $_SERVER['DOCUMENT_ROOT'] . '/../' . $path;
    }

    public static function root_require($path)
    {
        return require(self::getRootPath($path));
    }

    public static function root_require_once($path)
    {
        return require_once(self::getRootPath($path));
    }

    public static function root_include($path)
    {
        return include(self::getRootPath($path));
    }

    public static function root_include_once($path)
    {
        return include_once(self::getRootPath($path));
    }
}