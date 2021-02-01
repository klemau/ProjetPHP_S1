<?php

class Recette {
	public $id;
	public $bougie;
	public $nom_bougie;
	public $odeur;
	public $nom_odeur;
	public $quantite;

	function __construct($bougie, $odeur, $quantite, $nom_bougie=NULL, $nom_odeur=NULL, $id=NULL){
		$this->id = $id;
		$this->bougie = $bougie;
		$this->nom_bougie = $nom_bougie;
		$this->odeur = $odeur;
		$this->nom_odeur = $nom_odeur;
		$this->quantite = $quantite;
	}
}