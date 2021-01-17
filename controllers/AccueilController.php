<?php
//namespace controllers;
require_once('Controller.php');

class AccueilController extends Controller {
	function index(){
		echo("Appel de la fonction par defaut du controller Accueil : liste");
		$this->liste();
	}

	private function liste(){
		echo("Appel de la fonction liste du controller Accueil");
	}
}