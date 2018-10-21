<?php
/**
 * Created by PhpStorm.
 * User: mschm
 * Date: 2018-10-11
 * Time: 21:28
 */

//Diese Klasse behebt nur einen Bug des Hosting-Service
//Dieser verursacht, dass man bei Aufruf der Webseite zum public Verzeichnis weitergeleitet wird statt auf die Startseite
//Deshalb wird man von hier auf die Startseite weitergeleitet
class PublicController
{
    public function index()
    {
        Util::location("user/login");
    }
}