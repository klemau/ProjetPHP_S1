<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Livre.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class LivreModel {	
	function create($l){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				//Verifie l'existance du livre dans la base de donn�es
				if($this->getLivreByTitre($l->titre)!=NULL){
					echo("Livre d�j� connu");
				}
				else {
					var_dump($l->auteur);
					$insert = $database->query('INSERT INTO livre (titre, id_auteur) VALUES ("'.$l->titre.'", '.$l->auteur.')' );
					var_dump($insert);
					if($insert != false ) echo("Insertion effectuee");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteLivre($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM  livre WHERE id_livre='.$id);
				if($result!=null && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM livre WHERE id_livre='.$id);
					if($delete->fetch() != null ) echo("suppression effectu�e");
				}
				else {
					echo("livre inconnue");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateLivre($livre){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM livre WHERE id_livre='.$livre->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE livre SET titre="'.$livre->titre.', id_auteur='.$livre->auteur.'" WHERE id_livre='.$livre->id);
					if($update!= false ) echo("Modification effectu�e");
				}
				else {
					echo("Livre inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getLivreByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT titre,id_livre,id_auteur,nom_auteur FROM livre NATURAL JOIN auteur WHERE id_livre=".$id);
				if($result!=false){
					$l = $result->fetch();
					return new \Framework\Object\Livre($l['titre'], $l['id_auteur'], $l['nom_auteur'], $l['id_livre']);
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

	function getLivreByTitre($titre) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query("SELECT * FROM livre NATURAL JOIN auteur WHERE titre=\"$titre\"");
				if($result!=false){
					$l = $result->fetch();
					var_dump($l);
					return new \Framework\Object\Livre($l['titre'], $l['id_auteur'], $l['nom_auteur'], $l['id_livre']);
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

	function getListLivres(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$livres = array();
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM livre NATURAL JOIN auteur");

				if($result !=false){
					$l = $result->fetch();
					while($l != NULL){
						$livre = new \Framework\Object\Livre($l['titre'], $l['id_auteur'], $l["nom_auteur"], $l['id_livre']);
						array_push($livres, $livre);
						$l = $result->fetch();
					}
				}
				
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $livres;
	}
}