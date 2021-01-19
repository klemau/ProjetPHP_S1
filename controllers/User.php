<?php
//namespace controllers;
require_once('Controller.php');
require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AccueilController extends Controller {
	
	function index(){
		$this->display('form_login', 'Connexion', 'UserModel');
	}

	public function login() {
		
	}

	public function logout() {
		
	}
}