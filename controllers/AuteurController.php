<?php
namespace Framework\Controller;
require_once('Controller.php');

class AuteurController extends Controller {
	
	function index(){
		$this->display('liste', 'Liste Auteurs', $this->getAuteurs());
	}	

	function getAuteurs(){ // R�cup�re et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/AuteurModel.php');
		$model = new \Framework\Model\AuteurModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'valid�e'));
		return $model->getListAuteurs();
	}

}