<?php

$route = htmlspecialchars($_REQUEST['route']);

include $_SERVER['DOCUMENT_ROOT'].'/backend/src/api/weather/Controller.php';

function init($route){

    $controller = new Controller( $_REQUEST['request'] );

    if(method_exists($controller, $route))
        return $controller->{$route}();


    header("HTTP/1.0 404 Not Found");

}

init($route);
