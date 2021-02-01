<?php

class Bougie {
	public $nom;
	public $id;
	public $nom_livre; // Contient le nom du livre lié
	public $nom_collection; // Contient le nom de la collection liée
	public $livre; // Contient l'id du livre lié
	public $collection; // Contient l'id de la collection liée
	public $statut;
	public $events; //Contient les noms et id des évènements liées; A METTRE EN PLACE

	function __construct($nom, $livre, $collection, $statut, $nom_livre=NULL,$nom_collection=NULL, $events=NULL, $id=NULL){
		$this->nom = $nom;
		$this->id = $id;
		$this->livre = $livre;
		$this->nom_livre = $nom_livre;
		$this->nom_collection = $nom_collection;
		$this->collection = $collection;
		$this->statut = $statut;
		$this->events = $events;
	}
}