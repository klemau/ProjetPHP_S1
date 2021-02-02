<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Odeur.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class OdeurModel {	
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

	function getOdeurByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM odeur WHERE id_odeur=".$id);

				if($result!=false){
					$o = $result->fetch();
					return new \Framework\Object\Odeur($o['nom_odeur'], $o['statut_odeur'], $o['id_odeur']);
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

	function getOdeurByNom($nom) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM odeur WHERE nom_odeur='".$nom."'");

				if($result!=false){
					$o = $result->fetch();
					return new \Framework\Object\Odeur($o['nom_odeur'], $o['statut_odeur'], $o['id_odeur']);
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

	function getListOdeurs(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$odeurs = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM odeur");
				if($result !=false){
					$o = $result->fetch();
					
					while($o != NULL){
						$odeur = new \Framework\Object\Odeur($o['nom_odeur'], $o['statut_odeur'], $o['id_odeur']);
						array_push($odeurs, $odeur);
						$o = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $odeurs;
	}
}