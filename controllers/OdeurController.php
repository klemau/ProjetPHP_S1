<?php

require_once('Controller.php');

class OdeurController extends Controller {
	
	function index(){
		$this->display('listeOdeurs', 'Liste odeurs', $this->getOdeurs());
	}	

	function getOdeurs(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new OdeurModel();

		return $model->getListOdeurs();
	}

}