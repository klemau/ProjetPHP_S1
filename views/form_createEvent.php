<?php 
	global $url;
?>

<form action=<?php echo $url."/Event/create"; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de l'évenement </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitEvent" value="Ajouter l'évenement" />
</form>