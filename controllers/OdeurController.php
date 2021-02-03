<?php
namespace Framework\Controller;
require_once('Controller.php');

class OdeurController extends Controller {
	
	function index(){
		$this->display('listeOdeurs', 'Liste odeurs', $this->getOdeurs());
	}	

	function getOdeurs(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();

		return $model->getListOdeurs();
	}

	function update($id){
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();
		$user = $model->getOdeurByID($id);
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateOdeur', 'Modifier une Odeur',  $id);
		}
		else
		{
			$nom = $_POST['nom'];
			$statut = $_POST['statut'];
			$odeur = new \Framework\Object\Odeur($nom, $statut, $id);
			$model->updateOdeur($odeur);
			$this->display('listeOdeurs', 'Liste Odeurs', $this->getOdeurs());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();
		$model->deleteOdeur($id);
		$this->display('listeOdeurs', 'Liste Odeurs', $this->getOdeurs());
	}

	function create(){
		require_once(__DIR__.'/../models/OdeurModel.php');
		$model = new \Framework\Model\OdeurModel();
		if(!isset($_POST['submitOdeur']))
		{
			$this->display('form_createOdeur', 'Ajouter une Odeur', NULL);
		}
		else
		{
			$nom_odeur = $_POST['nom'];
			$statut_odeur = $_POST['statut'];
			$odeur = new \Framework\Object\Odeur($nom_odeur, $statut_odeur);
			$model->create($odeur);
			$this->display('listeOdeurs', 'Liste Odeurs', $this->getOdeurs());	
		}
	}

}