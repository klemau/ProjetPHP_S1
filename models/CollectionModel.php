<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Collection.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class CollectionModel {	
	function create($collection){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM collection WHERE nom_collection="'.$collection->nom.'"');
				if($result!=null && $result->fetch()!=null){
					echo("COLLECTION DEJA CONNUE");
				}
				else {
					$insert = $database->query('INSERT INTO collection (nom_collection) VALUES ("'.$collection->nom.'")' );
					if($insert->fetch() != null ) echo("Ajout effectué");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteCollection($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM collection WHERE id_collection='.$id);
				if($result!=null && $result->fetch()!=null){if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM collection WHERE id_collection='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
				}
				else {
					echo("Collection inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateCollection($collection){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM collection WHERE id_collection='.$collection->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE collection SET nom_collection="'.$collection->nom.'" WHERE id_collection='.$collection->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Collection inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

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