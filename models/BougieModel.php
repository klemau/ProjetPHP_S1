<?php
include(__DIR__.'/../objects/Bougie.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class BougieModel {	
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

	function getBougieByID($id) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection WHERE id_bougie='".$id."'");

				if($result!=false){
					$b = $result->fetch();$b = $result->fetch();				
					return new Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'], $b['id_bougie']);
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

	function getBougieByNom($nom) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection WHERE nom_bougie='".$nom."'");

				if($result!=false){
					$b = $result->fetch();$b = $result->fetch();				
					return new Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'], $b['id_bougie']);
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

	function getListBougies(){
		$database = DatabaseConnection::getDatabase();
		$bougies = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection");

				if($result !=false){
					$b = $result->fetch();
					while($b != NULL){
						$bougie = new Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'], $b['id_bougie']);
						array_push($bougies, $bougie);
						$b = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $bougies;
	}
}