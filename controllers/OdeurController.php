<?php
namespace Framework\Controller;
require_once('Controller.php');

class OdeurController extends Controller {
	
	function index(){
		$this->display('liste', 'Liste odeurs', $this->getOdeurs());
	}	

	function getOdeurs(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();

		return $model->getListOdeurs();
	}

	function update($id){

	}

	function delete($id){

	}

}