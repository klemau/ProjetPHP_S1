<?php

class Controller{
	// FONCTION D'APPEL DE LA METHODE $action
	function appel($action){
		if(method_exists($this,$action)){
			$this->{$action}();
		}
	}	

	public function display($page, $titre, $content)
    {
        /*if( file_exists('./models/'.$model.'.php')) {
            include_once('./models/'.$model.'.php');
		}*/
		
        if( ! file_exists('./views/'.$page.'.php')) {
            echo("Fichier inexistant ".$page.'.php');
        }
        else
        {
			$link='./views/'.$page.'.php';
			include('./views/Template.php');
		}
    }

	protected function verifySession(){
		return $_SESSION['login']!=null;
	}

	protected function verifyConnection(){
		require_once("./Models/UserModel.php");
		$mod = new UserModel();

		if(isset($_POST["login"]) && isset($_POST["password"])) {
			//si POST de login et de password existent, c'est qu'on arrive de Connexion
			try {
				if($mod->connect($_POST["login"], $_POST["password"]) == true) {
					//echo("<h3> Connexion reussie ".$_SESSION['login']."</h3>");
					return true;
				}
				else {
					//echo("<h3> Connexion ratee </h3>");
					//Renvoyer sur form_login et afficher l'erreur
				}
			}
			catch (Exception $e) {
				echo("La connexion a rate");
			}
		}

		elseif (isset($_POST["submit"]) && $_POST["submit"]=="Se Deconnecter") {
			//si POST submit est egal a "Se Deconnecter", c'est qu'on veut terminer la session
				
			echo("<h3>Deconnexion reussie</h3>");
			session_unset();
			session_destroy();
			session_start();
			$_SESSION['login']=NULL;
		}
		return false;
	}
}