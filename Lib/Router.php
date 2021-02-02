<?php
namespace Framework;

class Router
{
	// $controller, $action, $id -> $_GET 
	// $controller = Bougie, $action = Edit, $id

	// FONCTION DE CREATION DU CONTROLLER DEMANDE
	function createController($controller, $action, $id){
		if($controller=='' || $controller==null){
			$controller='Accueil';
		}
		$controllerName =$controller.'Controller'; // $controllerName='BougieController.php';
		
		if(file_exists('controllers/'.$controllerName.'.php')){
			require_once('controllers/'.$controllerName.'.php');
			$controllerName="Framework\\Controller\\".$controllerName;
			$cont = new $controllerName();

			//Appel méthode $action 
			if($action=='' || $action==null){
				$action='index';
			}
			$_POST['id']=$id;
			$cont->Appel($action);
		}
	}
}