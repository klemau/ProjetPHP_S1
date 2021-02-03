<?php
namespace Framework\Controller;
require_once('Controller.php');

class BougieController extends Controller {
	
	function index(){
		$this->display('listeBougies', 'Liste Bougies', $this->getBougies());
	}	

	function getBougies(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new \Framework\Model\BougieModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'validée'));
		return $model->getListBougies();
	}

	function update($id){
		
	}

	function delete($id){

	}

	function link($id)
	{
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new \Framework\Model\BougieModel();
		require_once(__DIR__.'/../models/EventModel.php');
		$modelEvent = new \Framework\Model\EventModel();
		$bougie = $model->getBougieByID($id);
		if(!isset($_POST['submitLiens']))
		{
			$this->display('form_linkBougieEvent', 'Lier', array("bougie" => $bougie, "events" => $modelEvent->getListEvents()));
		}
		else
		{
			if(empty($_POST['liens'])) 
			{
				$liens = array();
			} 
			else 
			{
  				$liens = $_POST['liens'];
  			}
			$model->changeEventLinks($id, $liens);
			$this->display('listeBougies', 'Liste Bougies', $this->getBougies());
		}
	}

	function create(){
		require_once(__DIR__.'/../models/BougieModel.php');
		$model = new \Framework\Model\BougieModel();
		require_once(__DIR__.'/../models/LivreModel.php');
		$modelLivre = new \Framework\Model\LivreModel();
		require_once(__DIR__.'/../models/CollectionModel.php');
		$modelCollection = new \Framework\Model\CollectionModel();
		print_r($_POST);
		if(!isset($_POST['submitBougie']))
		{
			$this->display('form_createBougie', 'Créer une bougie', array("livres" => $modelLivre->getListLivres(), "collection" => $modelCollection->getListCollections()));
		}
		else
		{
			if(! isset($_POST['nom']) || empty($_POST['nom']))
			{
				echo "Nom Obligatoire.";
				$this->display('form_createBougie', 'Créer une bougie', array("livres" => $modelLivre->getListLivres(), "collection" => $modelCollection->getListCollections()));
				exit(1);
			}
			else
			{
				$nom = $_POST['nom'];
			}

			if( ! isset($_POST['livre']))
			{
				echo "Choix d'un livre obligatoire";
				$this->display('form_createBougie', 'Créer une bougie', array("livres" => $modelLivre->getListLivres(), "collection" => $modelCollection->getListCollections()));
				exit(1);
			}
			else
			{
				$livre = $_POST['livre'];
			}

			if( ! isset($_POST['statut']))
			{
				echo "Choix d'un statut obligatoire";
				$this->display('form_createBougie', 'Créer une bougie', array("livres" => $modelLivre->getListLivres(), "collection" => $modelCollection->getListCollections()));
				exit(1);
			}
			else
			{
				$statut = $_POST['statut'];
			}
			
			if(empty($_POST['collection'])) { 
				$collection = NULL;
			} else {
				$collection = $_POST['collection'];
			}
			
			// var_dump($login);
			// var_dump($pwd);
			$model->create($nom,$livre,$collection,$statut);
			$this->display('listeBougies', 'Liste Bougies', $this->getBougies());
		}
	}

}