<?php
namespace Framework\Model;

include(__DIR__.'/../objects/Auteur.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class AuteurModel {	
	function create($auteur){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM auteur WHERE nom_auteur="'.$auteur->nom.'"');
				if($result!=null && $result->fetch()!=null){
					echo("AUTEUR DEJA CONNU");
				}
				else {
					$insert = $database->query('INSERT INTO auteur (nom_auteur) VALUES ("'.$auteur->nom.'")' );
					if($insert->fetch() != null ) echo("Ajout effectué");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteAuteur($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM auteur WHERE id_auteur='.$id);
				if($result!=null && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM auteur WHERE id_auteur='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
				}
				else {
					echo("Auteur inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateAuteur($auteur){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM auteur WHERE id_auteur='.$auteur->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE collection SET nom_auteur="'.$auteur->nom.'" WHERE id_auteur='.$auteur->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Auteur inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getAuteurByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM auteur WHERE id_auteur=".$id);

				if($result!=false){
					$a = $result->fetch();				
					return new \Framework\Object\Auteur($a['nom_auteur'], $a['id_auteur']);
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
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM auteur WHERE nom_auteur='".$nom."'");

				if($result!=false){
					$a = $result->fetch();				
					return new \Framework\Object\Auteur($a['nom_auteur'], $a['id_auteur']);
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
		$database = \Framework\DatabaseConnection::getDatabase();
		$auteurs = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM auteur");

				if($result !=false){
					$a = $result->fetch();
					while($a != NULL){
						$auteur = new \Framework\Object\Auteur($a['nom_auteur'], $a['id_auteur']);
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