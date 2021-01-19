<?php 

//namespace Lib;

class DatabaseConnection
{
	private static $bdd = null;

	private function __construct(){}

	public static function getDatabase(){
		if (self::$bdd == null) {
			try{
				self::$bdd = new PDO('mysql:host=localhost;dbname=bougies;charset=utf8','root','');
			}
			catch (Exception $e){
				die('Erreur : '.$e->getMessage());
			}
		}
		return self::$bdd;
	} 
}