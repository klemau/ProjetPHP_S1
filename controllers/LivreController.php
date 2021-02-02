<?php
namespace Framework\Controller;
require_once('Controller.php');

class LivreController extends Controller {
	
	function index(){
		$this->display('listeLivres', 'Liste Livres', $this->getLivres());
	}	

	function getLivres(){ // R�cup�re et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new \Framework\Model\LivreModel();
		
		return $model->getListLivres();
	}

	function update($id){

	}

	function delete($id){

	}

}