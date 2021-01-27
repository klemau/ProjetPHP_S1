<?php

//namespace controllers;

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
}