<?php
//namespace controllers;
require_once('Controller.php');
//require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class UserController extends Controller {
	
	function index(){
		$this->display('form_login', 'Connexion', 'UserModel');
	}

	public function login() {
		//Appel de form_login pour récupérer les données (id, mdp)
		//Appel de UserModel pour effectuer la connexion avec ces données
	}

	public function logout() {
		
	}
}