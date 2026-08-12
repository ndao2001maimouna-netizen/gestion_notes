<?php

$routers = [
     '/' => [
        'controller' => 'noteController',
        'action' => 'afficherNote'
    ]
];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $routers[$uri] ?? $routers['/'];

$controller = $route['controller'];
$action = $route['action'];

if (file_exists(dirname(__DIR__ ). "/controller/$controller.php")) {

    require_once dirname (__DIR__ ). "/controller/$controller.php";

    if (function_exists($action)) {
        $action();
    }
} else {
    http_response_code(404);
}
