<?php

    return [
        'defaultController' => 'default',
        'defaultAction' => 'index',
        'layout' => 'main',
        'db' => [
            'dsn' => 'mysql:host=127.0.0.1;dbname=mvc_csv;charset=utf8',
            'user' => 'root',
            'pass' => '',
            'opt' => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]
        ],
    ];