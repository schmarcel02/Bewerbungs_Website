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
        View::displayView("default/home");
    }
}