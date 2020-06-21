<?php

    $controller = $params['defaultController'];
    $action = $params['defaultAction'];
    if (!empty($_GET['route'])) {
        $route = explode('/', $_GET['route']);
        if (count($route) == 2) {
            $controller = $route[0];
            $action = $route[1];
        }
    }
    $controller = 'controllers\\' . ucfirst($controller) . 'Controller';
    $action = ucfirst($action);