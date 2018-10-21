<?php
ClassLoader::loadByName('Util');

class DefaultController
{
    public function index()
    {
        Util::location('default/home');
    }

    public function home()
    {
        if (Util::isLoggedIn())
            View::displayView("default/home_loggedin");
        else
            View::displayView("default/home");
    }
}