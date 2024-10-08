<?php


require './vendor/autoload.php';

session_start();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', function (){
        $controller = new \App\Controllers\HomeController();
        $controller->index();
    });
    $r->addRoute('POST', '/create-task', function (){
        $controller = new \App\Controllers\TaskController();
        $controller->createTask();
    });
    $r->addRoute('POST', '/delete-task/{id}', function ($id){
        $controller = new \App\Controllers\TaskController();
        $controller->deleteTask($id);
    });
    $r->addRoute('GET', '/edit-task/{id}', function ($id){
        $controller = new \App\Controllers\TaskController();
        $controller->editTask($id);
    });
    $r->addRoute('POST', '/update-task/{id}', function ($id){
        $controller = new \App\Controllers\TaskController();
        $controller->updateTask($id);
    });
    $r->addRoute('GET', '/register', function (){
        $controller = new \App\Controllers\RegisterController();
        $controller->index();
    });
    $r->addRoute('POST', '/register', function (){
        $controller = new \App\Controllers\RegisterController();
        $controller->register();
    });
    $r->addRoute('GET', '/login', function (){
        $controller = new \App\Controllers\LoginController();
        $controller->index();
    });
    $r->addRoute('POST', '/login', function (){
        $controller = new \App\Controllers\LoginController();
        $controller->login();
    });

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 404;        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 405;
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
    call_user_func_array($handler,  $vars);
        break;
}


