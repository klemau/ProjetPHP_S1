<?php
namespace Framework\Controller;
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
		$this->display('liste', 'Liste Utilisateurs', $this->listeUsers());
	}

	function listeUsers(){ // Récupère et retourne une liste des tous les utilisateurs présents dans la base de données
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		return $model->getListUsers();
	}

	function update($id){
		//Test d'update ; A remplacer
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		$u = new \Framework\Object\User('Donna', 3,1);
		$model->updateUser($u);
		$this->display('liste', 'Liste Utilisateurs', $this->listeUsers());
	}

	function delete($id){
		//Test de delete ; A remplacer
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		$model->deleteUser($id);
		$this->display('liste', 'Liste Utilisateurs', $this->listeUsers());
	}
}