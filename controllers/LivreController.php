<?php
//namespace controllers;
require_once('Controller.php');
//require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class LivreController extends Controller {
	
	function index(){
		$this->display('listeLivres', 'Liste Livres', $this->getLivres());
	}	

	function getLivres(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new LivreModel();
		
		return $model->getListLivres();
	}

}