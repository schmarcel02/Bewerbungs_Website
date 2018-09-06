<?php
//Diese Datei stammt vom MVC

/*
 * Die index.php Datei ist der Einstiegspunkt des MVC. Hier werden zuerst alle
 * vom Framework benötigten Klassen geladen und danach wird die Anfrage dem
 * Dispatcher weitergegeben.
 *
 *
 * Wie in der .htaccess Datei beschrieben, werden alle Anfragen, welche nicht
 * auf eine bestehende Datei zeigen hierhin umgeleitet.
 */

// fix schf: approot für url

require_once '../lib/Dispatcher.php';
require_once '../lib/View.php';
require_once '../lib/Fragment.php';
require_once '../lib/RootPath.php';
require_once '../lib/ClassLoader.php';
session_start();
ClassLoader::loadByName('Util');
ClassLoader::loadByName('UserUtil');
ClassLoader::loadByName('TextUtil');
$dispatcher = new Dispatcher();
$dispatcher->dispatch();
