<?php

require_once('Controller.php');

class CollectionController extends Controller {
	
	function index(){
		$this->display('listeCollections', 'Liste Collections', $this->getCollections());		
	}

	private function getCollections(){		
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new CollectionModel();
		return $model->getListCollections();
	}

}