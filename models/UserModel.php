<?php
include(__DIR__.'/../objects/User.php');

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class UserModel {

	function create($login, $pass, $role=0){
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$user = $database->query('SELECT * FROM user WHERE login="'.$login.'"');
				if($user!=null && $user->fetch()!=null){
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

	function getUserByLogin($login) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE login="'.$login.'"');
				if($user!=null){
					$us = $result->fetch();
					return new User($us['login'], $us['id'],$us['role']);
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function getUserByID($id) {
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try{
				$result = $database->query('SELECT * FROM user WHERE id='.$id);
				if($user!=null){
					$us = $result->fetch();
					return new User($us['login'], $us['id'],$us['role']);
				}
			}
			catch(Exception $e){
				var_dump($e->getMessage());
				die();
			}
		}
	}

	function connect($login, $pass){
		$database = DatabaseConnection::getDatabase();
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
		$database = DatabaseConnection::getDatabase();
		$users = [];
		if($database!=null){
			try {
				$result = $database->query("SELECT * FROM user");
				if($result!=null){
					$us =$result->fetch();
					while($us != NULL){
						$user = new User($us['login'], $us['id'],$us['role']);
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