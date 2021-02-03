<?php 
	global $url;
	$id = $content;
	// var_dump($content);
?>

<form action=<?php echo $url."/Auteur/update/".$id; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de l'auteur </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitAuteur" value="Modifier l'auteur" />
</form>