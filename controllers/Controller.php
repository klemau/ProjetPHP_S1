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
			include('./views/Template.php');
		}
		
		/* A passer dans un template.php 
        echo "<!DOCTYPE html>";
		echo "<html>";
		echo "<head>";
		//intégration de Bootstrap
		echo "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\">";
		echo "<title>".$titre."</title>";
		echo "</head>";

		echo "<header>";
		include('./views/menu.php');
		echo "<h1>".$titre."</h1>";
		echo "</header>";		 
		echo "<body>";
		echo "<p>contenu html</p>";
		include($link);
		echo "</body>";
		echo "<footer>";
		include('./views/footer.php');
		echo "</footer>";
		echo "</html>"; */
    }

	// FONCTION DE VERIFICATION DE LA SESSION
	// APPELLABLE UNIQUEMENT DEPUIS LES CONTROLLERS
	protected function verifySession(){
		return $_SESSION['login']!=null;
	}
}