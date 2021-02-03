<?php 
	global $url;

	$id = $content['id'];
	$bougies=$content['bougies']; // liste des bougie existant
	$odeurs=$content['odeurs']; // liste des bougie existant
?>

<form action=<?php echo $url."/Recette/update".$id; ?> method="post">
	<div class="input-group mb-3">
		<p>Bougie associée*</p>
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<?php foreach ($bougies as $bougie) {
			  echo "<input type=\"radio\" class=\"btn-check\" id=\"btncheck".$bougie->nom."\" name=\"bougie\" value=\"".$bougie->id."\">";
			  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$bougie->nom."\">".$bougie->nom."</label>";
			} ?>
		</div>
	</div>
	<div class="input-group mb-3">
		<p>Odeur associée*</p>
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<?php foreach ($odeurs as $odeur) {
				// print_r($livre);
			  echo "<input type=\"radio\" class=\"btn-check\" id=\"btncheck".$odeur->nom."\" name=\"odeur\" value=\"".$odeur->id."\">";
			  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$odeur->nom."\">".$odeur->nom."</label>";
			} ?>
		</div>
	</div>
	<div class="input-group mb-3">
		<label for="customRange3" class="form-label">Quantité</label>
		<input type="range" class="form-range" min="0" max="20" step="0.5" id="customRange3" name="quantite">
	</div>
<input type="submit" class="btn btn-primary" name="submitRecette" value="Modifier la recette" />
</form>