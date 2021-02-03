<?php
namespace Framework\Controller;
require_once('Controller.php');

class AuteurController extends Controller {
	
	function index(){
		$this->display('listeAuteurs', 'Liste Auteurs', $this->getAuteurs());
	}	

	function getAuteurs(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/AuteurModel.php');
		$model = new \Framework\Model\AuteurModel();
		//$model->create(new Bougie("Bougie test", 1, 1, 'validée'));
		return $model->getListAuteurs();
	}

	function update($id){
		require_once(__DIR__.'/../models/AuteurModel.php');
		$model = new \Framework\Model\AuteurModel();
		$user = $model->getAuteurByID($id);
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateAuteur', 'Modifier une Auteur', $id);
		}
		else
		{
			$nom = $_POST['nom'];
			$e = new \Framework\Object\Auteur($id, $nom);
			$model->updateAuteur($e);
			$this->display('listeAuteurs', 'Liste Auteurs', $this->getAuteurs());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/AuteurModel.php');
		$model = new \Framework\Model\AuteurModel();
		$model->deleteAuteur($id);
		$this->display('listeAuteurs', 'Liste Auteurs', $this->getAuteurs());
	}

	function create(){
		require_once(__DIR__.'/../models/AuteurModel.php');
		$model = new \Framework\Model\AuteurModel();
		if(!isset($_POST['nom']))
		{
			$this->display('form_createAuteur', 'Ajouter une Auteur', NULL);
		}
		else
		{
			$nom = $_POST['nom'];
			var_dump($nom);
			$a = new \Framework\Object\Auteur($nom);
			$model->create($a);
			$this->display('listeAuteurs', 'Liste Auteurs', $this->getAuteurs());	
		}
	}

}