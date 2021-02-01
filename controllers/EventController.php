<?php

require_once('Controller.php');

class EventController extends Controller {
	
	function index(){
		$this->display('listeEvents', 'Liste Events', $this->getEvents());
	}	

	function getEvents(){ // R�cup�re et retourne une liste des tous les �v�nements
		require_once(__DIR__.'/../models/EventModel.php');
		$model = new EventModel();

		return $model->getListEvents();
	}

}