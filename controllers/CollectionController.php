<?php
namespace Framework\Controller;
require_once('Controller.php');

class CollectionController extends Controller {
	
	function index(){
		$this->display('liste', 'Liste Collections', $this->getCollections());		
	}

	private function getCollections(){		
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new \Framework\Model\CollectionModel();
		return $model->getListCollections();
	}

	function update($id){

	}

	function delete($id){

	}
}