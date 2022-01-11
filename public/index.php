<?php
require_once __DIR__ . "/../vendor/autoload.php";

use ExpressPHP\Express\Express;

$app = new Express();

$app->setControllersPath("App\\Controllers\\");

$app->get(route: "/", controller: "IndexController", action: "index");
$app->get(route: "/conta/login", controller: "IndexController", action: "login");
$app->get(route: "/conta/criar", controller: "IndexController", action: "create");
$app->get(route:"/registrar", controller:"IndexController", action:"createAccount");
$app->get(route:"/login", controller:"AuthController", action:"autenticate");
$app->get(route:"/app", controller:"AppController", action:"index");
$app->get(route:"/sair", controller:"AuthController", action:"exit");

$app->listen();