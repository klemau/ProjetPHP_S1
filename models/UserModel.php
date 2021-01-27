<?php

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

	function connect($login, $pass){
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			try {
				$user = $database->query('SELECT * FROM user WHERE login="'.$login.'" AND pwd="'.$pass.'"');
				if($user!=null){
					$us = $user->fetch();
					$_SESSION['login'] = $us['login'];
					$_SESSION['pass'] = $us['pwd'];
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
				$user = $database->query("SELECT * FROM user");
				if($user!=null){
					$us =$user->fetch();
					while($us != NULL){
						array_push($users, $us['login']);
						$us = $user->fetch();
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