<?php


//Programme qui sert de "launcher"


require_once('Router.php');

define('URL',str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$router = new Router();
$router->routeReq();