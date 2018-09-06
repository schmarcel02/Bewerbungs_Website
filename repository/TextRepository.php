<?php
ClassLoader::loadByName("Repository");

class TextRepository extends Repository
{
    public static function insertTranslations($brief, $de, $en, $fr)
    {
        $query = "INSERT INTO text(brief, de, en, fr) VALUES(?, ?, ?, ?)";
        ConnectionHandler::executeQuery($query, "ssss", $brief, $de, $en, $fr);
    }

    public static function insertTranslation($brief, $lng, $text)
    {
        $query = "INSERT INTO text(brief, $lng) VALUES(?, ?)";
        ConnectionHandler::executeQuery($query, "ss", $brief, $text);
    }

    public static function insertBrief($brief)
    {
        $query = "INSERT INTO text(brief) VALUES(?)";
        ConnectionHandler::executeQuery($query, "s", $brief);
    }

    public static function updateTranslations($id, $brief, $de, $en, $fr)
    {
        $query = "UPDATE text SET brief = ?, de = ?, en = ?, fr = ? WHERE id = ?";
        ConnectionHandler::executeQuery($query, "ssssi", $brief, $de, $en, $fr, $id);
    }

    public static function updateTranslation($id, $lng, $text)
    {
        $query = "UPDATE text SET $lng = ? WHERE id = ?";
        ConnectionHandler::executeQuery($query, "si", $text, $id);
    }

    public static function updateTranslationByBrief($brief, $lng, $text)
    {
        $query = "UPDATE text SET $lng = ? WHERE brief = ?";
        ConnectionHandler::executeQuery($query, "ss", $text, $brief);
    }

    public static function updateBrief($id, $brief)
    {
        $query = "UPDATE text SET brief = ? WHERE id = ?";
        ConnectionHandler::executeQuery($query, "si", $brief, $id);
    }

    public static function selectTranslationsById($id)
    {
        $query = "SELECT * FROM text WHERE id = ?";
        return ConnectionHandler::selectRow($query, "i", $id);
    }

    public static function selectTranslationById($id, $lng)
    {
        $query = "SELECT $lng FROM text WHERE id = ?";
        return ConnectionHandler::selectSpecific($lng, $query, "i", $id);
    }

    public static function selectTranslationsByBrief($brief)
    {
        $query = "SELECT * FROM text WHERE brief = ?";
        return ConnectionHandler::selectRow($query, "s", $brief);
    }

    public static function selectTranslationByBrief($brief, $lng)
    {
        $query = "SELECT $lng FROM text WHERE brief = ?";
        return ConnectionHandler::selectSpecific($lng, $query, "s", $brief);
    }

    public static function deleteTranslationsById($id)
    {
        $query = "DELETE FROM text WHERE id = ?";
        ConnectionHandler::executeQuery($query, "i", $id);
    }

    public static function deleteTranslationsByBrief($brief)
    {
        $query = "DELETE FROM text WHERE brief = ?";
        ConnectionHandler::executeQuery($query, "s", $brief);
    }

    public static function deleteTranslationById($id, $lng)
    {
        $query = "DELETE $lng FROM text WHERE id = ?";
        ConnectionHandler::executeQuery($query, "i", $id);
    }

    public static function deleteTranslationByBrief($brief, $lng)
    {
        $query = "DELETE $lng FROM text WHERE brief = ?";
        ConnectionHandler::executeQuery($query, "s", $brief);
    }

    public static function selectBriefs()
    {
        $query = "SELECT brief FROM text ORDER BY brief";
        return ConnectionHandler::selectRows($query);
    }

    public static function briefExists($brief)
    {
        $query = "SELECT count(brief) AS 'count' FROM text WHERE brief = ?";
        return ConnectionHandler::selectSpecific("count", $query, "s", $brief) > 0;
    }
}