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
}