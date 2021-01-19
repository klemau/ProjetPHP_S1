<?php

//namespace controllers;

class Controller{
	// FONCTION D'APPEL DE LA METHODE $action
	function appel($action){
		if(method_exists($this,$action)){
			$this->{$action}();
		}
	}

	// METHODE PAR DEFAUT
	function index(){

	}	

	// FONCTION DE VERIFICATION DE LA SESSION
	// APPELLABLE UNIQUEMENT DEPUIS LES CONTROLLERS
	protected function verifySession(){
		return $_SESSION['login']!=null;
	}
}