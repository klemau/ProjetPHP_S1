<?php
//namespace controllers;
require_once('Controller.php');
require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AccueilController extends Controller {
	
	function index(){
		$this->liste();
		$this->display('accueil', 'Accueil', 'UserModel');
	}

	private function liste(){
		/*echo("<h1> Accueil </h1>");
		echo("<h2> Welcome </h2>");
		echo("<p> Bienvenue sur SITE </p>");
		try {
			$database = DatabaseConnection::getDatabase(); 

			require_once(__DIR__.'/../models/UserModel.php');
			$mod = new UserModel();
			if($mod->connect("Amy", "RaggedyMan") == true){
				echo("<h2> Hello ".$_SESSION['login']."</h2>");
			}
			else {
				echo("<h2> Login failed. </h2>");
			}

		}
		catch (Exception $e){
			echo("Connection loupée");
		}*/
	}
}