<?php

class Odeur {
	public $nom;
	public $id;
	public $statut;

	function __construct($nom, $statut, $id=NULL){
		$this->nom = $nom;
		$this->id = $id;
		$this->statut = $statut;
	}
}