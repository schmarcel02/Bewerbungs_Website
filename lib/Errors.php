<?php
ClassLoader::loadByName("TextRepository");

//Diese Klasse stammt von mir
class Errors
{
    public static function getErrorByKey($key)
    {
        return TextRepository::selectTranslationByBrief("error_$key", $_SESSION['lng']);
    }

    public static function getError()
    {
        return self::hasError() ? self::getErrorByKey($_GET['error']) : "";
    }

    public static function hasError()
    {
        return isset($_GET['error']);
    }
}