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
		if(!isset($_POST['tabLink']))
		{
			$this->display('form_linkBougieEvent', 'Lier', array("bougie" => $bougie, "events" => $modelEvent->getListEvents()));
		}
		else
		{
			$login = $_POST['login'];
			if($_POST['password'] == $_POST['passwordVerif']) // vérifie si les deux mots de passe sont identiques
			{
				$pwd = $_POST['password'];
			}
			else
			{
				echo "Les deux mot de passe sont différents.";
				$this->display('form_createUser', 'S\'inscrire', NULL);
			}
			// var_dump($login);
			// var_dump($pwd);
			$model->create($login, $pwd);
			$this->display('accueil', 'Bienvenue', NULL);
		}
	}

}