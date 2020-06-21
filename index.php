<?php
session_start();
require_once 'config/autoload.php';
$params = require_once 'config/params.php';
require_once 'config/router.php';

MVC::getBase($params);

        $outputCont = new $controller();
        if (method_exists($outputCont, $action)) {
            $outputCont->$action();
        } else {
            exit('ERROR 404');
        }