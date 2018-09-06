<?php

/**
 * Der Dispatcher ist dafür zuständig, alle Requests an den entsprechenden
 * Controller weiterzuleiten.
 *
 * Der Dispatcher schaut die URI des Requests an und leitet aufgrund davon die
 * Anfrage an die gewünschte Funktion im entsprechenden Controller weiter. Die
 * URI wird wie im folgenden Beispiel verarbeitet:
 *
 *   /user/delete?id=7&foo=bar
 *    |    |      └────┴─ GET Parameter stehen im Array $_GET zur Verfügung
 *    |    |
 *    |    └─ Der Wert nach dem zweiten Slash heisst so wie die Funktion, welche
 *    |         auf dem Contoller aufgeruft werden soll.
 *    |
 *    └─ Dem Wert nach dem ersten Slash wird noch "Controller" angehängt um
 *         herauszufinden, wie der gewünschte Controller heisst.
 *
 *   Sollte ein Teil in der URI nicht vorhanden sein, wird als Controllername
 *     "DefaultController" bzw. "index" als Funktionsname verwendet.
 */
class Dispatcher
{
    /**
     * Diese Methode wertet die Request URI aus leitet die Anfrage entsprechend
     * weiter.
     */
    public static function dispatch()
    {
        // Die URI wird aus dem $_SERVER Array ausgelesen und in ihre
        //   Einzelteile zerlegt.
        // /user/index/foo --> ['user', 'index', 'foo']
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?'); // Erstes ? und alles danach abschneiden
        $uri = trim($uri, '/'); // Alle / am anfang und am Ende der URI abschneiden
        $uriFragments = explode('/', $uri); // In einzelteile zerlegen
        // fix schf: urlpfadteile oberhalb approot ignorieren

        // Den Namen des gewünschten Controllers ermitteln
        $controllerName = 'DefaultController';
        if (!empty($uriFragments[0])) {
            $controllerName = $uriFragments[0];
            $controllerName = ucfirst($controllerName); // Erstes Zeichen grossschreiben
            $controllerName .= 'Controller'; // "Controller" anhängen
        }

        // Den Namen der auszuführenden Methode ermitteln
        $method = 'index';
        if (!empty($uriFragments[1])) {
            $method = $uriFragments[1];
        }

        for ($i = 2; !empty($uriFragments[$i]); $i++) {
            $x = $i - 2;
            $GLOBALS['parameter' . $x] = $uriFragments[$i];
        }

        $path = "../controller/$controllerName.php";
        if (!file_exists($path)) {
            self::notFound();
        } else {
            require_once $path;
            $controller = new $controllerName();
            if (!method_exists($controller, $method)) {
                self::notFound();
            } else {
                $controller->$method();
            }
        }
        // Eine neue Instanz des Controllers wird erstellt und die gewünschte
        //   Methode darauf aufgerufen.
    }

    private static function notFound()
    {
        require_once "../controller/ErrorController.php";
        $controller = new ErrorController();
        $controller->notFound();
    }
}

?>