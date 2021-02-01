<?php
include(__DIR__.'/../objects/Recette.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class RecetteModel {	
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

	function getRecetteByID($id) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur WHERE id_recette=".$id));
				
				if($result!=false){
					$r = $result->fetch();
					return new Recette($r['id_bougie'], $r['id_odeur'], $r['quantite'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);
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
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur WHERE nom_recette='".$nom."'"));
				
				if($result!=false){
					$r = $result->fetch();
					return new Recette($r['id_bougie'], $r['id_odeur'], $r['qte'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);
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
		$database = DatabaseConnection::getDatabase();
		$recettes = array();
		if($database!=null){
			try {
				$result = $database->query(utf8_encode("SELECT id_bougie, id_odeur,nom_bougie, nom_odeur, id_recette, quantité as qte FROM recette NATURAL JOIN bougie NATURAL JOIN odeur"));
				if($result !=false){
					$r = $result->fetch();

					while($r != NULL){
						$recette = new Recette($r['id_bougie'], $r['id_odeur'], $r['qte'], $r['nom_bougie'],$r['nom_odeur'], $r['id_recette']);

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