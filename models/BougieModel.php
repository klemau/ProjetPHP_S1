<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Bougie.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class BougieModel {	
	function create($nom,$livre,$collection,$statut){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				//Verifie l'existance de la bougie dans la base de données
				// var_dump($this->getBougieByNom($nom));
				if($this->getBougieByNom($nom)->id!=NULL){
					echo("Bougie déjà connue");
				}
				else {
					$insert = $database->query('INSERT INTO bougie (nom_bougie, id_livre, id_collection, statut_bougie) 
						VALUES ("' .$nom. '", '.$livre.', '.$collection.', "'.$statut.'")' );

					if($insert != false ) echo("Insertion effectuee");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}		

	function deleteBougie($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM bougie WHERE id_bougie='.$id);
				if($result!=null && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM bougie WHERE id_bougie='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
					$database->query('DELETE FROM events WHERE id_bougie='.$id);
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

	function updateBougie($bougie){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM bougie WHERE id_bougie='.$bougie->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE event SET nom_bougie="'.$bougie->nom.'", id_livre='.$bougie->livre.', id_collection='.$bougie->collection.', statut_bougie="'.$bougie->statut.'" WHERE id_bougie='.$bougie->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Bougie inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function changeEventLinks($id, $events){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM bougie WHERE id_bougie='.$id);
				if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM events WHERE id_bougie='.$id);
					foreach($events as $idE){
						$update = $database->query("INSERT INTO events (id_event, id_bougie) VALUES ($idE,$id)");
					}
				}
				else {
					echo("Bougie inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getBougieByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection WHERE id_bougie=".$id);

				if($result!=false){
					$b = $result->fetch();
					$id=$b['id_bougie'];
						
					// Récupération des events liés
					$events = array();
					$resEvents = $database->query("SELECT id_event, name FROM events INNER JOIN event ON event.id=events.id_event WHERE id_bougie=".$id);
					if($resEvents!=NULL){
						$e=$resEvents->fetch();
						while($e!=NULL){
							$event = array('id'=>$e['id_event'],'nom'=>$e['name']);
							array_push($events,$event);
							$e=$resEvents->fetch();
						}
					}

					return new \Framework\Object\Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'],$events, $b['id_bougie']);
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
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection WHERE nom_bougie='".$nom."'");

				if($result!=false){
					$b = $result->fetch();
					$id=$b['id_bougie'];
						
					// Récupération des events liés
					$events = array();
					$resEvents = $database->query("SELECT id_event, name FROM events INNER JOIN event ON event.id=events.id_event WHERE id_bougie=".$id);
					if($resEvents!=NULL){
						$e=$resEvents->fetch();
						while($e!=NULL){
							$event = array('id'=>$e['id_event'],'nom'=>$e['name']);
							array_push($events,$event);
							$e=$resEvents->fetch();
						}
					}
					return new \Framework\Object\Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'],$events, $b['id_bougie']);
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
		$database = \Framework\DatabaseConnection::getDatabase();
		$bougies = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT nom_bougie,id_bougie,titre,nom_collection,statut_bougie,id_livre,id_collection 
					FROM bougie NATURAL JOIN livre NATURAL JOIN collection");

				if($result !=false){
					$b = $result->fetch();
					while($b != NULL){
						$id=$b['id_bougie'];
						
						// Récupération des events liés
						$events = array();
						$resEvents = $database->query("SELECT id_event, name FROM events INNER JOIN event ON event.id=events.id_event WHERE id_bougie=".$id);
						if($resEvents!=NULL){
							$e=$resEvents->fetch();
							while($e!=NULL){
								$event = array('id'=>$e['id_event'],'nom'=>$e['name']);
								array_push($events,$event);
								$e=$resEvents->fetch();
							}
						}

						$bougie = new \Framework\Object\Bougie($b['nom_bougie'], $b['id_livre'], $b['id_collection'], $b['statut_bougie'], $b['titre'], $b['nom_collection'], $events, $b['id_bougie']);
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