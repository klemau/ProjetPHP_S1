<?php

//namespace controllers;

class Controller{
	// FONCTION D'APPEL DE LA METHODE $action
	function appel($action){
		if(method_exists($this,$action)){
			$this->{$action}();
		}
	}

	// METHODE PAR DEFAUT
	function index(){

	}	

	public function display($content, $titre, $model)
    {
        if( file_exists('./models/'.$model.'.php')) {
            include_once('./models/'.$model.'.php');
        }
        if( ! file_exists('./views/'.$content.'.php')) {
            echo("Fichier inexistant ".$content.'.php');
        }
        else
        {
        	$link='./views/'.$content.'.php';
        }

        echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
		echo "<title>".$titre."</title>";
		include('./views/menu.php');
		echo "</head>";
		 
		echo "<body>";
		echo "<p>contenu html</p>";
		include($link);
		echo "</body>";
		echo "<footer>";
		include('./views/footer.php');
		echo "</footer>";
		echo "</html>";
    }

	// FONCTION DE VERIFICATION DE LA SESSION
	// APPELLABLE UNIQUEMENT DEPUIS LES CONTROLLERS
	protected function verifySession(){
		return $_SESSION['login']!=null;
	}
}