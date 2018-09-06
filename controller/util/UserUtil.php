<?php
ClassLoader::loadByName('Util');
ClassLoader::loadByName('UserRepository');

class UserUtil
{
    public static function userExistsByMail($mail)
    {
        return UserRepository::userExistsByMail($mail);
    }

    public static function restrictUserExistsByMail($mail, $el = "user/create")
    {
        if (self::userExistsByMail($mail)) {
            Util::errorLocation($el, "*user");
        }
    }

    public static function requireUserExistsByMail($mail, $el = "user/login")
    {
        if (!self::userExistsByMail($mail)) {
            Util::errorLocation($el, "!user");
        }
    }

    public static function getUserByMail($mail, $el = "user/login")
    {
        self::requireUserExistsByMail($mail, $el);
        return UserRepository::selectByMail($mail);
    }

    public static function userExistsById($id)
    {
        return UserRepository::userExistsById($id);
    }

    public static function requireUserExistsById($id, $el = "user/login")
    {
        if (!self::userExistsById($id)) {
            Util::errorLocation($el, "!user");
        }
    }

    public static function getUserById($id, $el = "user/login")
    {
        self::requireUserExistsById($id, $el);
        return UserRepository::selectById($id);
    }

    public static function checkPassword($user, $password, $el = "user/login")
    {
        echo $password . ", " . $user->password;
        if (!password_verify($password, $user->password))
            Util::errorLocation($el, "!password");
    }

    public static function validate($email, $el = "user/create")
    {
        self::validateEmail($email, $el);
    }

    public static function validateEmail($email, $el = "user/create")
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            Util::errorLocation($el, "\$mail");
    }

    public static function validatePassword($password, $el = "user/create")
    {
        $uppercase = preg_match('@[A-Z]@', "" . $password);
        $lowercase = preg_match('@[a-z]@', "" . $password);
        $number = preg_match('@[0-9]@', "" . $password);
        $special = preg_match('@[^0-9a-zA-Z]@', "" . $password);
        if (!(strlen($password) >= 8 && $uppercase && $lowercase && $number && $special))
            Util::errorLocation($el, "\$password");
    }

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function setUserData($user)
    {
        self::setUserDatas($user->id, $user->email, $user->permission);
    }

    public static function checkKey($key)
    {
        $keys = UserRepository::selectKeys();
        for ($i = 0; $i < count($keys); $i++) {
            if (password_verify($key, $keys[$i]->password))
                return $keys[$i]->permission;
        }
        Util::errorLocation("user/create", "!key");
        return false;
    }

    public static function setUserDatas($id, $email, $perm)
    {
        $_SESSION['uid'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['permission'] = $perm;
    }
}