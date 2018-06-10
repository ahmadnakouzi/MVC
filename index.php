<?php

require_once("Request.php");
require_once("routes/api.php");

$request = new Request;
$url = $request->getUrl();
$url = $request->splitUrl($url);
$requestURL = explode("/", $url[0]);
$routes = new Routes();
$routes = $routes->get();

//checks for route if exists
if (array_key_exists($requestURL[1], $routes)) {
    //checks for CRUD
    if (array_key_exists($requestURL[2], $routes[$requestURL[1]])) {
        //http request type
        if (strtolower($_SERVER['REQUEST_METHOD']) === $routes[$requestURL[1]][$requestURL[2]]['method']) {
            $expected = $routes[$requestURL[1]][$requestURL[2]]['uses'];
            $expected = explode("@", $expected);
            __autoload($expected[0]);
            $controller = new $expected[0]();
            $function = $expected[1];
            $controller->$function();
        } else {
            $error->message = 'Incorrect http request type';
            $message = json_encode($error);
            print($message);
        }
    } else {
        $error->message = 'Incorrect use of CRUD';
        $message = json_encode($error);
        print($message);
    }
} else {
    $error->message = 'This route does not exists';
    $message = json_encode($error);
    print($message);
}

function __autoload($classname)
{
    $filename = "app/Controllers/". $classname .".php";
    include_once($filename);
}