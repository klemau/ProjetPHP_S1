<?php

class Collection {
	public $nom;
	public $id;

	function __construct($nom, $id){
		$this->nom = $nom;
		$this->id = $id;
	}
}