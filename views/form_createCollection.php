<?php 
	global $url;
?>

<form action=<?php echo $url."/Collection/create"; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de la collection </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitCollection" value="Ajouter la collection" />
</form>