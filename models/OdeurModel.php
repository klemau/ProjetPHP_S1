<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Odeur.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class OdeurModel {	
	function create($odeur){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM odeur WHERE nom_odeur="'.$odeur->nom.'"');
				if($result!=null && $result->fetch()!=null){
					echo("ODEUR DEJA CONNUE");
				}
				else {
					$insert = $database->query('INSERT INTO odeur (nom_odeur, statut_odeur) VALUES ("'.$odeur->nom.'", "'.$odeur->statut.'")' );
					if($insert->fetch() != null ) echo("Ajout effectué");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteOdeur($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM odeur WHERE id_odeur='.$id);
				if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM odeur WHERE id_odeur='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
				}
				else {
					echo("Odeur inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateOdeur($odeur){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM odeur WHERE id_odeur='.$odeur->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE odeur SET nom_odeur="'.$odeur->nom.'", statut_odeur="'.$odeur->statut.'" WHERE id_odeur='.$odeur->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Odeur inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

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