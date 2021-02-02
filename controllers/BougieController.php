<?php
namespace Framework\Controller;
require_once('Controller.php');

class BougieController extends Controller {
	
	function index(){
		$this->display('listeBougies', 'Liste Bougies', $this->getBougies());
	}	

	function getBougies(){ // R�cup�re et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new \Framework\Model\BougieModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'valid�e'));
		return $model->getListBougies();
	}

	function update($id){
		
	}

	function delete($id){

	}

}