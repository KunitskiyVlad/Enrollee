<?php
include 'view/view.php';
include 'controller/controller.php';
include 'modell/modell.php';
include 'config/dbapi.php';
include 'Http/RouteCollection.php';
include 'Http/Router.php';
include 'Result.php';
session_start();
$request = \App\Http\Request::FactoryRequest();
$routes = new \App\Http\RouteCollection();
$routes->get('home','/','controller_home@index');
$routes->get('registration','/registration','controller_registration@index');
$routes->get('cabinet','/cabinet','controller_cabinet@index');
$rout = new \App\Http\Router($routes);
$result =$rout->match($request);
$handler = new Result($result->getHandler());
$handler->call();
//Router::start(new \App\Http\Request());
