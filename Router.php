<?php
use App\Http\RouteCollection;
use App\Http\Router;
$routes = new RouteCollection();
$routes->get('home','/','controller_home@index');
$routes->get('registration','/registration','controller_registration@index');
$routes->get('cabinet','/cabinet','controller_cabinet@index');
$rout = new Router($routes);