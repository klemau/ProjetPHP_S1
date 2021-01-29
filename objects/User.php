<?php

class User {
	public $login;
	public $id;
	public $role;

	function __construct($login, $id, $role = 0){
		$this->login = $login;
		$this->id = $id;
		$this->role = $role;
	}
}