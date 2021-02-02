<?php
namespace Framework\Model;
include(__DIR__.'/../objects/User.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class UserModel {

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

	function connect($login, $pass){
		$database = \Framework\DatabaseConnection::getDatabase();
		if($database!=null){
			try {
				$result = $database->query('SELECT * FROM user WHERE login="'.$login.'" AND pwd="'.$pass.'"');
				if($result!=null){
					$us = $result->fetch();
					$_SESSION['login'] = $us['login'];
					$_SESSION['role'] = $us['role'];
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
		return $_SESSION['login'] != null;
	}

	function getListUsers(){
		$database = \Framework\DatabaseConnection::getDatabase();
		$users = [];
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM user");
				if($result!=null){
					$us =$result->fetch();
					while($us != NULL){
						$user = new \Framework\Object\User($us['login'], $us['id'],$us['role']);
						array_push($users, $user);
						$us = $result->fetch();
					}
				}
			}
			catch (Exception $e){
				var_dump($e->getMessage());
				die();
			}			
		}
		return $users;
	}
}