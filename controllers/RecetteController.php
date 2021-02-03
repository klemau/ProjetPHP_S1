<?php
namespace Framework\Controller;
require_once('Controller.php');

class RecetteController extends Controller {
	
	function index(){
		$this->display('listeRecettes', 'Liste Recettes', $this->getRecettes());
	}	

	function getRecettes(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new \Framework\Model\RecetteModel();

		return $model->getListRecettes();
	}

	function update($id){
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new \Framework\Model\RecetteModel();
		$user = $model->getRecetteByID($id);
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateRecette', 'Modifier une Recette',  array("id" => $id, "bougies" => $modelBougie->getListBougies(), "odeurs" => $modelOdeur->getListOdeurs()));
		}
		else
		{
			$nom = $_POST['nom'];
			$model->updateRecette($id, $nom);
			$this->display('listeRecettes', 'Liste Recettes', $this->getRecettes());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new \Framework\Model\RecetteModel();
		$model->deleteRecette($id);
		$this->display('listeRecettes', 'Liste Recettes', $this->getRecettes());
	}

	function create(){
		require_once(__DIR__.'/../models/RecetteModel.php');
		$model = new \Framework\Model\RecetteModel();
		require_once(__DIR__.'/../models/BougieModel.php');
		$modelBougie = new \Framework\Model\BougieModel();
		require_once(__DIR__.'/../models/OdeurModel.php');
		$modelOdeur = new \Framework\Model\OdeurModel();
		if(!isset($_POST['submitRecette']))
		{
			$this->display('form_createRecette', 'Ajouter une Recette', array("bougies" => $modelBougie->getListBougies(), "odeurs" => $modelOdeur->getListOdeurs()));
		}
		else
		{
			$id_odeur = (int) $_POST['odeur'];
			$id_bougie = (int) $_POST['bougie'];
			$quantite = (int) $_POST['quantite'];
			$recette = new \Framework\Object\Recette($id_bougie, $id_odeur, $quantite);
			$model->create($recette);
			$this->display('listeRecettes', 'Liste Recettes', $this->getRecettes());	
		}
	}

}