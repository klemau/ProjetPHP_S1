<?php 
	global $url;
	$id = $content;
?>

<form action=<?php echo $url."/Odeur/update".$id; ?> method="post">
	<div class="mb-3">
		<label for="nom"> Nom de l'odeur </label>
		<input type="input" name="nom" /><br />
	</div>
	<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
	  <input type="radio" class="btn-check" name="statut" id="btnadmin" autocomplete="off" value="wish">
	  <label class="btn btn-outline-primary" for="btnadmin">Souhait</label>

	  <input type="radio" class="btn-check" name="statut" id="btnmodo" autocomplete="off" value="possess">
	  <label class="btn btn-outline-primary" for="btnmodo">Possédé</label>

	  <input type="radio" class="btn-check" name="statut" id="btnuser" autocomplete="off" value="idea">
	  <label class="btn btn-outline-primary" for="btnuser">Idée</label>
	</div>
<input type="submit" class="btn btn-primary" name="submitOdeur" value="Modifier l'odeur" />
</form>