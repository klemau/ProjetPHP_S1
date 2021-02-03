<?php 
	global $url;
	$auteurs=$content;
?>

<form action=<?php echo $url."/Livre/create"; ?> method="post">
	<div class="mb-3">
		<label for="nom"> Nom du Livre </label>
		<input type="input" name="nom" /><br />
	</div>
	<div class="input-group mb-3">
		<p>Auteur</p>
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<?php foreach ($auteurs as $auteur) {
				// print_r($livre);
			  echo "<input type=\"radio\" class=\"btn-check\" id=\"btncheck".$auteur->nom."\" name=\"auteur\" value=\"".$auteur->id."\">";
			  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$auteur->nom."\">".$auteur->nom."</label>";
			} ?>
		</div>
	</div>
<input type="submit" class="btn btn-primary" name="submitLivre" value="Ajouter le Livre" />
</form>