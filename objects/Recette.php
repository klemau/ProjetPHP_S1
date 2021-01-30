<?php

class Recette {
	public $id;
	public $bougie;
	public $odeur;
	public $quantite;

	function __construct($id, $bougie, $odeur, $quantite){
		$this->id = $id;
		$this->bougie = $bougie;
		$this->odeur = $odeur;
		$this->quantite = $quantite;
	}
}