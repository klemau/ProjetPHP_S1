<?php

require_once('Controller.php');

class RecetteController extends Controller {
	
	function index(){
		$this->display('listeRecettes', 'Liste Recettes', $this->getRecettes());
	}	

	function getRecettes(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new RecetteModel();

		return $model->getListRecettes();
	}

}