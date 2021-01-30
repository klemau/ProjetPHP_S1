<?php

class Auteur {
	public $id;
	public $nom;

	function __construct($id, $nom){
		$this->nom = $nom;
		$this->id = $id;
	}
}