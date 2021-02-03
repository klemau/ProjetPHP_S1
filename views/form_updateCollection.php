<?php 
	global $url;
	$id = $content;
	// var_dump($content);
?>

<form action=<?php echo $url."/Collection/update/".$id; ?> method="post">
  <div class="mb-3">
  	<label for="nom"> Nom de la collection </label>
	<input type="input" name="nom" /><br />
</div>
<input type="submit" class="btn btn-primary" name="submitCollection" value="Modifier la collection" />
</form>