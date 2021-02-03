<?php
namespace Framework\Controller;
require_once('Controller.php');

class LivreController extends Controller {
	
	function index(){
		$this->display('listeLivres', 'Liste Livres', $this->getLivres());
	}	

	function getLivres(){ // Récupère et retourne une liste des toutes les bougies
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new \Framework\Model\LivreModel();
		
		return $model->getListLivres();
	}

	function update($id){
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new \Framework\Model\LivreModel();
		$user = $model->getLivreByID($id);
		require_once(__DIR__.'/../models/AuteurModel.php');
		$modelAuteur = new \Framework\Model\AuteurModel();
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateLivre', 'Modifier une Livre',  array("id" => $id, "auteurs" => $modelAuteur->getListAuteurs()));
		}
		else
		{
			$nom = $_POST['nom'];
			$model->updateLivre($id, $nom);
			$this->display('listeLivres', 'Liste Livres', $this->getLivres());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new \Framework\Model\LivreModel();
		$model->deleteLivre($id);
		$this->display('listeLivres', 'Liste Livres', $this->getLivres());
	}

	function create(){
		require_once(__DIR__.'/../models/LivreModel.php');
		$model = new \Framework\Model\LivreModel();
		require_once(__DIR__.'/../models/AuteurModel.php');
		$modelAuteur = new \Framework\Model\AuteurModel();
		if(!isset($_POST['submitLivre']))
		{
			$this->display('form_createLivre', 'Ajouter un Livre', $modelAuteur->getListAuteurs());
		}
		else
		{
			$nom_Livre = $_POST['nom'];
			$auteur_Livre =(int)$_POST['auteur'];
			$Livre = new \Framework\Object\Livre($nom_Livre, $auteur_Livre);
			$model->create($Livre);
			$this->display('listeLivres', 'Liste Livres', $this->getLivres());	
		}
	}

}