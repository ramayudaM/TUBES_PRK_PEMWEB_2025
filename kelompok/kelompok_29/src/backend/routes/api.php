<?php
$routes = [
    [
        'method' => 'POST',
        'path' => 'auth/login',
        'controller' => __DIR__ . '/../controllers/auth/login.php',
    ],
    [
        'method' => 'POST',
        'path' => 'auth/register',
        'controller' => __DIR__ . '/../controllers/auth/register.php',
    ],
    [
        'method' => 'POST',
        'path' => 'auth/logout',
        'controller' => __DIR__ . '/../controllers/auth/logout.php',
    ],
    [
        'method' => 'GET',
        'path' => 'health',
        'controller' => __DIR__ . '/../controllers/health.php',
    ],
];
