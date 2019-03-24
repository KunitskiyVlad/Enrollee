<?php
use App\HTTP\Request;
include 'view/view.php';
include 'controller/controller.php';
include 'modell/modell.php';
include 'config/dbapi.php';
include 'Router.php';
Router::start(new \App\Http\Request());
