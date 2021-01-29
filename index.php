<?php
include 'Lib/Router.php';

session_start();
if(! isset($_SESSION['login']))
{
	$_SESSION['login']=null;
}

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

/*
var_dump($controller);
var_dump($action);
var_dump($id);
*/

$router->createController($controller, $action, $id);