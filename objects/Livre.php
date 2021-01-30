<?php

class Livre {
	public $titre;
	public $id;
	public $nom_auteur;
	public $auteur; // Contient l'id de l'auteur

	function __construct($titre, $auteur, $nom_auteur=NULL, $id=NULL){
		$this->titre = $titre;
		$this->id = $id;
		$this->nom_auteur=$nom_auteur;
		$this->auteur = $auteur;
	}
}