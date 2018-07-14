<?php 
include 'controller/controller.php';
include 'view/view.php';
include 'modell/modell.php';
include 'config/db.php';
include 'Router.php';
include 'config/configuration.php';
//$data =array('email'=>'zalupa@', 'count'=>228);
//$condition = array('id' => '1');
//$connect = new DBApi($params);
//$connect->insert('test', $data);
//$connect->update('test', $data, $condition);
//$connect->delete('test', $condition);
//$result = $connect->select('test');
Router::start();