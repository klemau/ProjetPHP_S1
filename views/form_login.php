<?php 
global $url;
	if($content != NULL){
		echo "<h3>".$content."</h3>";
	}
?>

<form action=<?php echo $url."/Accueil"?> method="post">
	<div class="mb-3">
  		<label for="role" class="form-label"> Rôle </label>
		<select class="form-select" aria-label="role" name="role">
			<option selected value="utilisateur">Utilisateur</option>
			<option value="juge">Juge</option>
			<option value="organisateur">Administrateur</option>
		</select>
	</div>
  	<div class="mb-3">
  		<label for="login" class="form-label"> Identifiant </label>
		<input type="input" name="login" class="form-control" />
	</div>
	<div class="mb-3">
		<label for="password" class="form-label"> Mot de passe </label>
		<input type="password" name="password" class="form-control"/>
	</div>
	<input type="submit" class="btn btn-primary" name="submit" value="Connexion" />
</form>
