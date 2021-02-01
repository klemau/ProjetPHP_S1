<?php
//namespace controllers;
//require_once(__DIR__.'/../objects/Bougie.php');
require_once('Controller.php');

class UserController extends Controller {
	
	function index(){
	
		if(isset($_SESSION['role']) && $_SESSION['role']==2)//Si l'utilisateur actuel est admin( = role 2)
		{
			$this->display('listeUtilisateurs', 'Liste Utilisateurs', $this->listeUsers());
		}
		else
		{
			$this->display('error', 'Accès interdit', NULL);
		}
	}

	function listeUsers(){ // Récupère et retourne une liste des tous les utilisateurs présents dans la base de données
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new UserModel();
		return $model->getListUsers();
	}

	function delete($id)
	{
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new UserModel();
		return $model->deleteUserByID($id);
	}


}