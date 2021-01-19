<?php

require_once(__DIR__.'/../Lib/DatabaseConnection.php');

class UserModel {

	function connect($login, $pass){
		$database = DatabaseConnection::getDatabase();
		if($database!=null){
			$user = $database->query('SELECT * FROM user WHERE login="'.$login.'" AND pwd="'.$pass.'"');
			if($user!=null){
				$us = $user->fetch();
				$_SESSION['login'] = $us['login'];
				$_SESSION['pass'] = $us['pwd'];
			}
		}
		return $_SESSION['login'] != null;
	}
}