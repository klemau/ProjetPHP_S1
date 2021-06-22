<?php 
global $url;
	if($content != NULL){
		echo "<h3>".$content."</h3>";
	}
?>

<form action=<?php echo $url."/Accueil"?> method="post">
  <div class="mb-3">
  	<label for="login"> Identifiant </label>
	<input type="input" name="login" /><br />
</div>
<div class="mb-3">
	<label for="password"> Mot de passe </label>
	<input type="password" name="password" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submit" value="Connexion" />
</form>
