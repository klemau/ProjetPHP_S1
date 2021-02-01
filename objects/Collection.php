<?php
namespace Framework\Object;

class Collection {
	public $nom;
	public $id;

	function __construct($nom, $id=null){
		$this->nom = $nom;
		$this->id = $id;
	}
}