<?php

session_start();

include('config/middleware.php');
include('./app/Controllers/AuthController.php');
include('./app/Controllers/StudentController.php');
include('./app/Controllers/HomeController.php');

$routes = [
    '' => 'HomeController@viewHomePage',
    '/home' => 'HomeController@viewHomePage',
    '/register' => 'StudentController@register',
    '/create' => 'StudentController@create',
    '/list' => 'StudentController@listStudents',
    '/search' => 'StudentController@searchStudents',
    '/login' => 'AuthController@login',
];

$defaultRoute = '/public/views/LogInPage.php';

$request_uri = $_SERVER['REQUEST_URI'];
$route = rtrim(strtok($request_uri, '?'), '/');

if (in_array($route, ['', '/home', '/register', '/create', '/list', '/search']) && !isset($_SESSION['user_id'])) {
    $_SESSION['redirect_url'] = $route;
    header('Location: /login');
    exit();
}

if (array_key_exists($route, $routes)) {
    $route_parts = explode('@', $routes[$route]);
    $controller = $route_parts[0];
    $method = $route_parts[1];

    $controller = new $controller();
    $controller->$method();
} else {
    echo '404 Not Found';
}

?>
