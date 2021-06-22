<?php
namespace Framework\Model;
include(__DIR__.'/../objects/Organisateur.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class OrganisateurModel {

	/*
	function create($login, $pass, $role=0){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE login="'.$login.'"');
				if($result!=null && $result->fetch()!=null){
					echo("LOGIN DEJA PRIS");
				}
				else {
					$insert = $database->query('INSERT INTO user (login, pwd, role) VALUES ("' .$login. '", "' .$pass. '", "' .$role. '")' );
					if($insert->fetch() != null ) echo("Inscription effectuée");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteUser($id){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE id='.$id);
				if($result!=false && $result->fetch()!=null){
					$delete = $database->query('DELETE FROM user WHERE id='.$id);
					if($delete->fetch() != null ) echo("suppression effectuée");
				}
				else {
					echo("Utilisateur inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function updateUser($u){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE id='.$u->id);
				if($result!=false && $result->fetch()!=null){
					$update = $database->query('UPDATE user SET role='.$u->role.' WHERE id='.$u->id);
					if($update!= false ) echo("Modification effectuée");
				}
				else {
					echo("Utilisateur inconnu");
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getUserByLogin($login) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE login="'.$login.'"');
				if($result!=null){
					$us = $result->fetch();
					return new \Framework\Object\User($us['login'], $us['id'],$us['role']);
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getUserByID($id) {
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE id='.$id);
				if($result!=null){
					$us = $result->fetch();
					return new \Framework\Object\User($us['login'], $us['id'],$us['role']);
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function deleteUserByID($id) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('DELETE user WHERE id='.$id);
				return $result;
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}
	*/

	function connect($login, $pass){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try {
				$result = $database->query('SELECT * FROM juge WHERE login="'.$login.'" AND pass="'.$pass.'"');
				if($result!=null){
					$us = $result->fetch();
					$_SESSION['login'] = $us['login'];
					$_SESSION['role'] = 2;
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
		return $_SESSION['login'] != null;
	}

	function getListJuges(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$juges = [];
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM juge");
				if($result!=null){
					$j =$result->fetch();
					while($j != NULL){
						$juge = new \Framework\Object\Juge($j['id_juge'], $j['nom'], $j['login'],$j['pass'], $j['mail']);
						array_push($juges, $juge);
						$j = $result->fetch();
					}
				}
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $juges;
	}
}