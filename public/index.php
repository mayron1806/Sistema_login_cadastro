<?php
require_once __DIR__ . "/../vendor/autoload.php";

use ExpressPHP\Express\Express;

$app = new Express("App\\Controllers\\");


$app->addRoute(route: "/", controller: "IndexController", action: "index", is_default_route: true);
$app->addRoute(route: "/conta/login", controller: "IndexController", action: "login");
$app->addRoute(route: "/conta/criar", controller: "IndexController", action: "create");
$app->addRoute(route:"/registrar", controller:"IndexController", action:"createAccount");
$app->addRoute(route:"/login", controller:"AuthController", action:"autenticate");
$app->addRoute(route:"/app", controller:"AppController", action:"index");
$app->addRoute(route:"/sair", controller:"AuthController", action:"exit");

$app->listen();