<?php
namespace Framework\Controller;
require_once('Controller.php');

class CollectionController extends Controller {
	
	function index(){
		$this->display('listeCollections', 'Liste Collections', $this->getCollections());		
	}

	private function getCollections(){		
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new \Framework\Model\CollectionModel();
		return $model->getListCollections();
	}

	function update($id){
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new \Framework\Model\CollectionModel();
		$user = $model->getCollectionByID($id);
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateCollection', 'Modifier une collection', $id);
		}
		else
		{
			$nom = $_POST['nom'];
			$model->updateCollection($id, $nom);
			$this->display('listeCollections', 'Liste Collections', $this->getCollections());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new \Framework\Model\CollectionModel();
		$model->deleteCollection($id);
		$this->display('listeCollections', 'Liste Collections', $this->getCollections());
	}

	function create(){
		require_once(__DIR__.'/../models/CollectionModel.php');
		$model = new \Framework\Model\CollectionModel();
		if(!isset($_POST['nom']))
		{
			$this->display('form_createCollection', 'Ajouter une collection', NULL);
		}
		else
		{
			$nom = $_POST['nom'];
			var_dump($nom);
			$model->create($nom);
			$this->display('listeCollections', 'Liste Collections', $this->getCollections());	
		}
	}
}