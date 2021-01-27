<?php
//namespace controllers;
require_once('Controller.php');
//require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class UserController extends Controller {
	
	function index(){
		if($_SESSION['login']==null)
		{
			$this->display('form_login', 'Connexion', 'UserModel');
		}
		else
		{
			$this->display('form_logout', 'Déconnexion', 'UserModel');
		}
	}

	public function login() {

		//Appel de form_login pour récupérer les données (id, mdp)
		//Appel de UserModel pour effectuer la connexion avec ces données
		try {
			$database = DatabaseConnection::getDatabase(); 
			require_once(__DIR__.'/../models/UserModel.php');
			$mod = new UserModel();
			if(isset($_POST["login"]) && isset($_POST["password"]))
			if($mod->connect($_POST["login"],$_POST["password"]) == true){
				$_SESSION['login']=$_POST["login"];
			}
			else {
				echo("<h2> Login failed </h2>");
			}
		}
		catch (Exception $e){
			echo("Connection loupée");
		}

	}

	public function logout() {
		
	}
}