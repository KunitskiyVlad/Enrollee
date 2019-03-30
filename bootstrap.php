<?php
include 'view/view.php';
include 'controller/controller.php';
include 'modell/modell.php';
include 'config/dbapi.php';
include 'Result.php';
include 'Router.php';
session_start();
$request = \App\Http\Request::FactoryRequest();
$result =$rout->match($request);
$handler = new Result($result->getHandler());
$handler->call();
//Router::start(new \App\Http\Request());
