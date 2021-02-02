<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Recette.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class RecetteModel {	
	function create($recette){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM recette WHERE id_bougie='.$recette->bougie.' AND id_odeur='.$recette->odeur);
				if($result!=null && $result->fetch()!=null){
					echo("RECETTE DEJA CONNUE");
				}
				else {
					$insert = $database->query(utf8_encode('INSERT INTO recette (id_bougie, id_odeur, quantité) VALUES ('.$recette->bougie.', '.$recette->odeur.','.$recette->quantite.')'));
					if($insert->fetch() != null ) echo("Ajout effectué");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteRecette($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM recette WHERE id_recette='.$id);
				if($result!=null && $result->fetch()!=null){if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM recette WHERE id_recette='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
				}
				else {
					echo("Recette inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateRecette($recette){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM recette WHERE id_recette='.$recette->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query(utf8_encode('UPDATE recette SET id_bougie='.$recette->bougie.', id_odeur='.$recette->odeur.', quantité='.$recette->quantite' WHERE id_recette='.$recette->id));
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Recette inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getRecetteByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur WHERE id_recette=".$id));
				
				if($result!=false){
					$r = $result->fetch();
					return new \Framework\Object\Recette($r['id_bougie'], $r['id_odeur'], $r['quantite'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);
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

	function getRecetteByNom($nom) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur WHERE nom_recette='".$nom."'"));
				
				if($result!=false){
					$r = $result->fetch();
					return new \Framework\Object\Recette($r['id_bougie'], $r['id_odeur'], $r['qte'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);
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

	function getListRecettes(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$recettes = array();
		if($database!=null){
			try {
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur"));
				if($result !=false){
					$r = $result->fetch();

					while($r != NULL){
						$recette = new \Framework\Object\Recette($r['id_bougie'], $r['id_odeur'], $r['qte'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);

						array_push($recettes, $recette);
						$r = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $recettes;
	}
}