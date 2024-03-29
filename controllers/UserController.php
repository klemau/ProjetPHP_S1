<?php
namespace Framework\Controller;
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
		$model = new \Framework\Model\UserModel();
		return $model->getListUsers();
	}


	function update($id){
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		$user = $model->getUserByID($id);
		if(!isset($_POST['role']))
		{
			$this->display('form_updateUser', 'Modifier un utilisateur', $user);
		}
		else
		{
			$role = (int) $_POST['role'];
			// var_dump($role);
			$u = new \Framework\Object\User($user->login, $user->id, $role);
			$model->updateUser($u);
			$this->display('listeUtilisateurs', 'Liste Utilisateurs', $this->listeUsers());
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		$model->deleteUser($id);
		$this->display('listeUtilisateurs', 'Liste Utilisateurs', $this->listeUsers());
	}

	function create(){
		require_once(__DIR__.'/../models/UserModel.php');
		$model = new \Framework\Model\UserModel();
		if(!isset($_POST['login']))
		{
			$this->display('form_createUser', 'S\'inscrire', NULL);
		}
		else
		{
			$login = $_POST['login'];
			if($_POST['password'] == $_POST['passwordVerif']) // vérifie si les deux mots de passe sont identiques
			{
				$pwd = $_POST['password'];
			}
			else
			{
				echo "Les deux mot de passe sont différents.";
				$this->display('form_createUser', 'S\'inscrire', NULL);
			}
			// var_dump($login);
			// var_dump($pwd);
			$model->create($login, $pwd);
			$this->display('accueil', 'Bienvenue', NULL);
		}
	}

}