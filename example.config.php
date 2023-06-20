<?php

/**
 * Returns database configuration options including the host, database name, username, password and PDO options.
 *
 * @return array
 */
return [
    'database' => [
        'name' => 'conference',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
