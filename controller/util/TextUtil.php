<?php
ClassLoader::loadByName("TextRepository");

class TextUtil
{
    public static function getText($brief)
    {
        return self::getTranslation($brief, $_SESSION['lng']);
    }

    public static function getTranslation($brief, $lng)
    {
        if (TextRepository::briefExists($brief)) {
            return TextRepository::selectTranslationByBrief($brief, $lng);
        }
        return "";
    }
}