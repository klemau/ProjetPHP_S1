<?php 
$mod = new UserModel();
// global $tab;
// echo $tabT = $mod->listeUser($tab);

// foreach ($tabMail as $value){
//     echo '<li> - '.$value.'</li>';
// }
echo '</ul>';

try {
	if($mod->connect("Amy", "RaggedyMan") == true){
		echo("<h2> Bienvenue ".$_SESSION['login']."</h2>");
	}
	else {
		echo("<h2> Bienvenue </h2>");
	}

}
catch (Exception $e){
	echo("Connection loupée");
}
?>