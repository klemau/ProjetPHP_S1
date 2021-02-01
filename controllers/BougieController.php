<?php

require_once('Controller.php');

class BougieController extends Controller {
	
	function index(){
		$this->display('listeBougies', 'Liste Bougies', $this->getBougies());
	}	

	function getBougies(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new BougieModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'validée'));
		return $model->getListBougies();
	}

}