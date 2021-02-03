<?php 
	global $url;
?>

<form action=<?php echo $url."/Auteur/create"; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de l'auteur </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitAuteur" value="Ajouter l'auteur" />
</form>