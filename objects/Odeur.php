<?php

class Odeur {
	public $nom;
	public $id;
	public $statut;

	function __construct($nom, $id, $statut){
		$this->nom = $nom;
		$this->id = $id;
		$this->statut = $statut;
	}
}