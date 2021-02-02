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

	}

	function delete($id){

	}

}