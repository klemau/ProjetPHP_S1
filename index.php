<?php
include 'Lib/Router.php';
//use Lib\Router as Router;
$controller=null;
$action=null;
$id=null;

$router = new Router();
if(isset($_GET['controller'])){
	$controller = $_GET['controller'];
}
if(isset($_GET['action'])){
	$action = $_GET['action'];
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
}


$router->createController($controller, $action, $id);