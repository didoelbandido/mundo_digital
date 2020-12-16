<?php namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(function ($buffer) {
            return $buffer;
        });
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (ENVIRONMENT !== 'production') {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
    }
});

Events::on('post_controller_constructor', function () {

    $router = service('router');
    $class = strtoupper($router->controllerName()); //Class llamada
    $method = strtoupper($router->methodName()); //metodo llamado
    $session = \Config\Services::session();
    $nocontrolados = array('\APP\CONTROLLERS\HOME', '\APP\CONTROLLERS\LOGIN', '\APP\CONTROLLERS\ERRORACCESO', '\APP\CONTROLLERS\CONTACTANOS','\APP\CONTROLLERS\SOMOS','\APP\CONTROLLERS\USUARIO');
    if (!in_array($class, $nocontrolados)) {
        if (!$session->has('usuario')) {
            $jus = base_url() . '/login/index';
            header('Location: ' . $jus);
            exit();
        } else {
            $paginas = $session->get('paginas');
            if (!in_array($class . $method, $paginas)) {
                $jus = base_url() . '/ErrorAcceso/index';
                header('Location: ' . $jus);
                exit();
            }

        }
    }

});
