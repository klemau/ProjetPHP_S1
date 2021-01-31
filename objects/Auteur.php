<?php

class Auteur {
	public $id;
	public $nom;

	function __construct($nom, $id=NULL){
		$this->nom = $nom;
		$this->id = $id;
	}
}