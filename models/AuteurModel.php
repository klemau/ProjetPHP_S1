<?php
include(__DIR__.'/../objects/Auteur.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AuteurModel {	
	/*
	function create($b){
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				//Verifie l'existance de la bougie dans la base de données
				var_dump($this->getBougieByNom($b->nom));
				if($this->getBougieByNom($b->nom)!=NULL){
					echo("Bougie déjà connue");
				}
				else {
					$insert = $database->query('INSERT INTO bougie (nom_bougie, id_livre, id_collection, statut_bougie) 
						VALUES ("' .$b->nom. '", '.$b->livre.', '.$b->collection.', "'.$b->statut.'")' );

					if($insert != false ) echo("Insertion effectuee");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}
	*/

	function getAuteurByID($id) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM auteur WHERE id_auteur=".$id);

				if($result!=false){
					$a = $result->fetch();				
					return new Auteur($a['nom_auteur'], $a['id_auteur']);
				}
				else {
					return null;
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getAuteurByNom($nom) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM auteur WHERE nom_auteur='".$nom."'");

				if($result!=false){
					$a = $result->fetch();				
					return new Auteur($a['nom_auteur'], $a['id_auteur']);
				}
				else {
					return null;
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getListAuteurs(){
		$database = DatabaseConnection::getDatabase();
		$auteurs = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM auteur");

				if($result !=false){
					$a = $result->fetch();
					while($a != NULL){
						$auteur = new Auteur($a['nom_auteur'], $a['id_auteur']);
						array_push($auteurs, $auteur);
						$a = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $auteurs;
	}
}