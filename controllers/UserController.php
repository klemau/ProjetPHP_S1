<?php
//namespace controllers;
require_once('Controller.php');

class UserController extends Controller {
	
	function index(){
		$this->display('form_login', 'Connexion', 'UserModel');
	}

	public function login() {
		try {
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