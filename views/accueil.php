<?php 
//$mod = new UserModel();
// global $tab;
// echo $tabT = $mod->listeUser($tab);

// foreach ($tabMail as $value){
//     echo '<li> - '.$value.'</li>';
// }
echo '</ul>';
/*
if(isset($_POST["login"]) && isset($_POST["password"])) {
	//si POST de login et de password existent, c'est qu'on arrive de Connexion
	try {
		if($mod->connect($_POST["login"], $_POST["password"]) == true) {
			echo("<h3> Connexion reussie ".$_SESSION['login']."</h3>");
		}
		else {
			echo("<h3> Connexion ratee </h3>");
		}
	}
	catch (Exception $e) {
		echo("La connexion a rate");
	}
}
elseif (isset($_POST["submit"]) && $_POST["submit"]=="Se DÃ©connecter") {
	//si POST submit est egal a "Se Deconnecter", c'est qu'on veut terminer la session

	echo("<h3>Deconnexion reussie</h3>");
	session_unset();
	session_destroy();
}
else {
	if($_SESSION['login']==null) {
		echo("<h2> Bienvenue </h2>");
	}
	else {
		echo("<h3> Bienvenue ".$_SESSION['login']."</h3>");
	}
}
*/
// Accueil Provisoire
// echo '<ul>';
// foreach ($content as $user){
//     echo '<li> '.$user->login.' = '.$user->role.' ; ID = '.$user->id.'</li>';
// }
// echo '</ul>';

// Accueil Final : Hub pour accéder aux pages

?>
