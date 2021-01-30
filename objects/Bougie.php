<?php

class Bougie {
	public $nom;
	public $id;
	public $nom_livre; // Contient le nom du livre li�
	public $nom_collection; // Contient le nom de la collection li�e
	public $livre; // Contient l'id du livre li�
	public $collection; // Contient l'id de la collection li�e
	public $statut;

	function __construct($nom, $livre, $collection, $statut, $nom_livre=NULL,$nom_collection=NULL, $id=NULL){
		$this->nom = $nom;
		$this->id = $id;
		$this->livre = $livre;
		$this->nom_livre = $nom_livre;
		$this->nom_collection = $nom_collection;
		$this->collection = $collection;
		$this->statut = $statut;
	}
}