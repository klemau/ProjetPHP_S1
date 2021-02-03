<?php 
	global $url;
	$id = $content;
	// var_dump($content);
?>

<form action=<?php echo $url."/Event/update/".$id; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de l'évenement </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitEvent" value="Modifier l'évenement" />
</form>