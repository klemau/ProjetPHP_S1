<?php
namespace Framework\Object;

class Event {
	public $id;
	public $nom;
	public $bougies; //Toutes les bougies li�es � cet event

	function __construct($nom, $bougies=NULL, $id=NULL){
		$this->id = $id;
		$this->nom = $nom;
		$this->bougies = $bougies;
	}
}