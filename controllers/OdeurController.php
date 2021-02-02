<?php
namespace Framework\Controller;
require_once('Controller.php');

class OdeurController extends Controller {
	
	function index(){
		$this->display('liste', 'Liste odeurs', $this->getOdeurs());
	}	

	function getOdeurs(){ // R�cup�re et retourne une liste des tous les �v�nements
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();

		return $model->getListOdeurs();
	}

	function update($id){

	}

	function delete($id){

	}

}