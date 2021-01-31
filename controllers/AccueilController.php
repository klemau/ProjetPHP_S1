<?php

require_once('Controller.php');

class AccueilController extends Controller {
	
	function index(){
		if ($this->verifyConnection() || !isset($_POST['login'])){ 
			$users = $this->getUsers();
			$this->display('accueil', 'Accueil', $users);
		}

		// Tentative d'accès à Accueil depuis Login avec des mauvais identifiants 
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

	function listeBougies(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new BougieModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'validée'));
		return $model->getListBougies();
	}

}