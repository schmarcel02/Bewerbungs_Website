<?php
ClassLoader::loadByName('UserUtil');

class UserController
{

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $view = new View('user/login');
        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->display();
    }

    public function doLogin()
    {
        Util::setErrorLoc('user/login');

        $mail = Util::getPost('txtMail');
        $pass = Util::getPost('txtPass');

        $user = UserUtil::getUserByMail($mail);

        UserUtil::checkPassword($user, $pass);
        UserUtil::setUserData($user);

        Util::location("default/home");
    }

    public function doLogout()
    {
        session_destroy();
        Util::location("user/login");
    }

    public function doCreate()
    {
        Util::setErrorLoc('user/create');

        $mail = Util::requirePost('txtMail');
        $pass = Util::requirePost('txtPass');
        if (($key = Util::getPost('txtKey')))
            $perm = UserUtil::checkKey($key);
        else
            $perm = 2;

        UserUtil::restrictUserExistsByMail($mail);
        UserUtil::validate($mail);
        UserRepository::insert($mail, UserUtil::hash($pass), $perm);
        UserUtil::setUserData(UserRepository::selectByMail($mail));

        Util::location("default/home");
    }

    public function permissionEditor()
    {
        Util::requirePermission(0);
        $view = new View("permission_editor");
        $view->users = UserRepository::selectUsers();
        $view->display();
    }

    public function setPermission()
    {
        Util::requirePermission(0);
        Util::setErrorLoc("text/emptyText");
        $uid = Util::requireParameter(0);
        $perm = Util::requireParameter(1);
        UserUtil::requireUserExistsById($uid);
        UserRepository::setPermission($uid, $perm);
    }

    public function hash()
    {
        Util::requirePermission(0);
        echo UserUtil::hash("ZLe6kwna") . "<br>";
        echo UserUtil::hash("eU9REsns") . "<br>";
        echo UserUtil::hash("QWy3k5pu") . "<br>";
        echo UserUtil::hash("8gnjBe7a") . "<br>";
    }
}
