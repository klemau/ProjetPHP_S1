<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Event.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class EventModel {	
	function create($e){
		var_dump($e);
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				//Verifie l'existance dans la base de données
				if($this->getEventByName($e->nom)!=NULL){
					echo("Event déjà connu");
				}
				else {
					$insert = $database->query('INSERT INTO event (name) VALUES ("' .$e->nom. '")' );
					if($insert != false ) {
						echo("Insertion event effectuee");
						if($e->bougies!=null){
							$id = $this->getEventID($e->nom);

							foreach($e->bougies as $bougie){
								$insert = $database->query('INSERT INTO events (id_bougie,id_event) VALUES ('.$bougie['id'].', '.$id.')');
								if($insert != false ) {
									echo("Insertion effectuée dans events");
								}
							}
						}
					}					
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteEvent($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM event WHERE id='.$id);
				if($result!=null && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM event WHERE id='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");

					$database->query('DELETE FROM events WHERE id_event='.$id);
				}
				else {
					echo("Event inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateEvent($event){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM event WHERE id='.$event->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE event SET name="'.$event->nom.'" WHERE id='.$event->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Event inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function changeBougieLinks($id, $bougies){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM event WHERE id='.$id);
				if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM events WHERE id_event='.$id);
					foreach($bougies as $idB){
						$update = $database->query("INSERT INTO events (id_event, id_bougie) VALUES ($id,$idB)");
					}
				}
				else {
					echo("Event inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}
	

	function getEventID($nom) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT id FROM event WHERE nom='".$nom."'");
				if($result!=false){
					$e = $result->fetch();
					return $e['id'];
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

	function getEventByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT name, id FROM event WHERE id=".$id);
				if($result!=false){
					$e = $result->fetch();
					$bougies = null;

					//Récupération des bougies liées :
					$resBougies = $database->query("SELECT id_bougie,nom_bougie FROM events NATURAL JOIN bougie WHERE id_event=".$id);
					if($resBougies!=false){
						$bougies = array();
						$b = $resBougies->fetch();
						while($b!=null){
							$bougie = array('id'=>$b['id_bougie'], 'nom'=>$b['nom_bougie']);
							array_push($bougies, $bougie);
							$b=$resBougies->fetch();
						}
					}					

					$newE = new \Framework\Object\Event($e['name'], $bougies, $e['id']);
					return $newE;
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

	function getEventByName($nom) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT name, id FROM event WHERE name='".$nom."'");
				var_dump($result);
				if($result!=false){
					$e = $result->fetch();
					$bougies = null;

					//Récupération des bougies liées :
					$resBougies = $database->query("SELECT id_bougie,nom_bougie FROM events NATURAL JOIN bougie WHERE id_event=".$e['id']);
					if($resBougies!=false){
						$bougies = array();
						$b = $resBougies->fetch();
						while($b!=null){
							$bougie = array('id'=>$b['id_bougie'], 'nom'=>$b['nom_bougie']);
							array_push($bougies, $bougie);
							$b=$resBougies->fetch();
						}
					}

					$newE = new \Framework\Object\Event($e['name'], $bougies, $e['id']);
					var_dump($newE);
					return $newE;
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

	function getListEvents(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$events = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT id FROM event");

				if($result !=false){
					$e = $result->fetch();
					while($e!=null){
						$event = $this->getEventByID($e['id']);
						array_push($events, $event);
						$e = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $events;
	}
}