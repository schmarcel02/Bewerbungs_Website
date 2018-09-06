<?php

class ErrorController
{
    public function index()
    {
        $this->notFound();
    }

    public function notFound()
    {
        $view = new View('not_found');
        $view->title = '404';
        $view->heading = '404 - Site not found';
        $view->display();
    }
}