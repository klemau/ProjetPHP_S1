<?php
namespace Framework\Object;

class Auteur {
	public $id;
	public $nom;

	function __construct($nom, $id=NULL){
		$this->nom = $nom;
		$this->id = $id;
	}
}