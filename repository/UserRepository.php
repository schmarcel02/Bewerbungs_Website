<?php
ClassLoader::loadByName("Repository");

class UserRepository
{
    public static function insert($email, $password, $permission)
    {
        $query = "INSERT INTO user (email, password, permission) VALUES (?, ?, ?)";
        ConnectionHandler::executeQuery($query, "sss", $email, $password, $permission);
    }

    public static function update($id, $email, $password)
    {
        $query = "UPDATE user SET email = ?, password = ? WHERE id = ?";
        ConnectionHandler::executeQuery($query, "ssi", $email, $password, $id);
    }

    public static function delete($id)
    {
        $query = "DELETE FROM user WHERE id = ?";
        ConnectionHandler::executeQuery($query, "i", $id);
    }

    public static function setPermission($uid, $perm)
    {
        $query = "UPDATE user SET permission = ? WHERE id = ?";
        ConnectionHandler::executeQuery($query, "ii", $perm, $uid);
    }

    public static function selectById($id)
    {
        $query = "SELECT * FROM user WHERE id = ? LIMIT 1";
        return ConnectionHandler::selectRow($query, 'i', $id);
    }

    public static function selectByMail($email)
    {
        $query = "SELECT * FROM user WHERE email = ? LIMIT 1";
        return ConnectionHandler::selectRow($query, 's', $email);
    }

    public static function userExistsById($id)
    {
        $query = "SELECT COUNT(*) AS total FROM user WHERE id = ?";
        return ConnectionHandler::selectSpecific("total", $query, "i", $id) >= 1;
    }

    public static function userExistsByMail($email)
    {
        $query = "SELECT COUNT(*) AS total FROM user WHERE email = ?";
        return ConnectionHandler::selectSpecific("total", $query, "s", $email) >= 1;
    }

    public static function selectUsers()
    {
        $query = "SELECT * FROM user";
        return ConnectionHandler::selectRows($query);
    }

    public static function selectKeys()
    {
        $query = "SELECT * FROM `key`";
        return ConnectionHandler::selectRows($query);
    }
}
