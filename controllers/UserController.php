<?php
//namespace controllers;
//require_once(__DIR__.'/../objects/Bougie.php');
require_once('Controller.php');

class UserController extends Controller {
	
	function index(){
	/*
		if($_SESSION['login']==null)
		{
			$this->display('form_login', 'Connexion', NULL);
		}
		else
		{
			$this->display('form_logout', 'Déconnexion', NULL);
		}
	*/
		$this->display('listeUtilisateurs', 'Liste Utilisateurs', $this->listeUsers());
	}

	function listeUsers(){ // Récupère et retourne une liste des tous les utilisateurs présents dans la base de données
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new UserModel();
		return $model->getListUsers();
	}
}