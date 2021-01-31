<?php
//namespace controllers;
require_once('Controller.php');
//require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AccueilController extends Controller {
	
	function index(){
		if ($this->verifyConnection() || !isset($_POST['login'])){
			$users = $this->getUsers();
			$this->display('accueil', 'Accueil', $users);
		}
		else {
			unset($_POST);
			$_POST = array();
			$this->display('form_login', 'Connexion', "Erreur de connexion");
		}
	}

	//Provisoirement utilisée pour tester les affichages sur l'accueil. Les diverses listes auront leur propre page et Controller par la suite
	private function getUsers(){		
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new UserModel();
		return $model->getListUsers();
	}

	// Gestion de la connection et deconnexion
	function session(){
		if($_SESSION['login']==null) {
			$this->display('form_login', 'Connexion', NULL);
		}
		else {
			$this->display('form_logout', 'Deconnexion', NULL);
		}
	}


}