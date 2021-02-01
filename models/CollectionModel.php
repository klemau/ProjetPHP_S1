<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Collection.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class CollectionModel {	
	/*
	function create($b){
		$database = \Framework\DatabaseConnection::getDatabase();
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

	function getCollectionByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM collection WHERE id_collection=".$id);

				if($result!=false){
					$c = $result->fetch();				
					return new \Framework\Object\Collection($c['nom_collection'], $c['id_collection']);
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

	function getCollectionByNom($nom) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM collection WHERE nom_collection='".$nom."'");

				if($result!=false){
					$c = $result->fetch();				
					return new \Framework\Object\Collection($c['nom_collection'], $c['id_collection']);
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

	function getListCollections(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$collections = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM collection");

				if($result !=false){
					$c = $result->fetch();
					while($c != NULL){
						$collection = new \Framework\Object\Collection($c['nom_collection'], $c['id_collection']);
						array_push($collections, $collection);
						$c = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $collections;
	}
}