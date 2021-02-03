<?php 
	global $url;
?>

<form action=<?php echo $url."/User/Create"?> method="post">
  <div class="mb-3">
  	<label for="login"> Identifiant </label>
	<input type="input" name="login" /><br />
</div>
<div class="mb-3">
	<label for="password"> Mot de passe </label>
	<input type="password" name="password" /><br />
</div>
<div class="mb-3">
	<label for="password"> Confirmer le mot de passe </label>
	<input type="password" name="passwordVerif" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submit" value="S'inscrire" />
</form>