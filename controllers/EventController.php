<?php
namespace Framework\Controller;
require_once('Controller.php');

class EventController extends Controller {
	
	function index(){
		$this->display('listeEvents', 'Liste Events', $this->getEvents());
	}	

	function getEvents(){ // Récupère et retourne une liste des tous les évènements
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new \Framework\Model\EventModel();

		return $model->getListEvents();
	}

	function update($id){
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new \Framework\Model\EventModel();
		$user = $model->getEventByID($id);
		if(!isset($_POST['nom']))
		{
			$this->display('form_updateEvent', 'Modifier une Event', $id);
		}
		else
		{
			$nom = $_POST['nom'];
			$e = new \Framework\Object\Event($id, $nom);
			$model->updateEvent($e);
			$this->display('listeEvents', 'Liste Events', $this->getEvents());		
		}
	}

	function delete($id){
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new \Framework\Model\EventModel();
		$model->deleteEvent($id);
		$this->display('listeEvents', 'Liste Events', $this->getEvents());
	}

	function create(){
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new \Framework\Model\EventModel();
		if(!isset($_POST['nom']))
		{
			$this->display('form_createEvent', 'Ajouter une Event', NULL);
		}
		else
		{
			$nom = $_POST['nom'];
			var_dump($nom);
			$e = new \Framework\Object\Event($nom);
			$model->create($e);
			$this->display('listeEvents', 'Liste Events', $this->getEvents());	
		}
	}

	function link($id)
	{
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new \Framework\Model\EventModel();
		require_once(__DIR__.'/../models/BougieModel.php');
		$modelBougie = new \Framework\Model\BougieModel();
		$event = $model->getEventByID($id);
		if(!isset($_POST['submitLiens']))
		{
			$this->display('form_linkEventBougie', 'Lier', array("event" => $event, "bougies" => $modelBougie->getListBougies()));
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
			$model->changeBougieLinks($id, $liens);
			$this->display('listeEvents', 'Liste Evénements', $this->getEvents());
		}
	}

}