<?php
namespace Framework\Controller;
require_once('Controller.php');

class AccueilController extends Controller {
	
	function index(){
		if ($this->verifyConnection() || !isset($_POST['login'])){ 
			//$users = $this->getUsers();
			$this->display('accueil', 'Accueil', NULL);
		}
	
		// Tentative d'accès à Accueil depuis Login avec des mauvais identifiants 
		else { 
			unset($_POST);
			$_POST = array();
			$this->display('form_login', 'Connexion', "Erreur de connexion");
		}			
		
		/*
		require_once("./Models/JugeModel.php");
		$mod = new \Framework\Model\JugeModel();
		$juges = $mod->getListJuges();
		$this->display('liste', 'Liste', $juges);
		*/
	}

	public function session(){
		$this->display('form_login', 'Connexion', NULL);
	}
	
}