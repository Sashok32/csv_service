<?php

    spl_autoload_register(function ($class) {
        $class = str_replace('\\', '/', $class);

        if (file_exists($class . '.php')) {
            include $class . '.php';
        } else {
            exit('ERROR 404');
        }

    });