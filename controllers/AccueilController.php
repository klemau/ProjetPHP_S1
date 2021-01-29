<?php
//namespace controllers;
require_once('Controller.php');
//require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AccueilController extends Controller {
	
	function index(){
<<<<<<< Updated upstream
		//$this->liste();	
		//Accueil provisoire : liste des logins utilisateurs 
		$users = $this->getUsers();
		$this->display('accueil', 'Accueil', $users);
		
		//Accueil final prévu : ?

		
		//Test ajout User dans la BDD --> Fonctionne
		/*
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new UserModel();
		$model->create("user4", "MdP");
		*/
=======
		if ($this->verifyConnection() || !isset($_POST['login'])){ 
			$users = $this->getUsers();
			$this->display('accueil', 'Accueil', $users);
		}

		// Accès à Accueil depuis Login avec des mauvais identifiants 
		else { 
			unset($_POST);
			$_POST = array();
			$this->display('form_login', 'Connexion', "Erreur de connexion");
		}
>>>>>>> Stashed changes
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