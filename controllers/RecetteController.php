<?php
namespace Framework\Controller;
require_once('Controller.php');

class RecetteController extends Controller {
	
	function index(){
		$this->display('liste', 'Liste Recettes', $this->getRecettes());
	}	

	function getRecettes(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new \Framework\Model\RecetteModel();

		return $model->getListRecettes();
	}

	function update($id){

	}

	function delete($id){

	}

}