<?php 
	global $url;
	$id=$content['id'];
	$livres=$content['livres']; // liste des bougie existant
	$collections=$content['collection']; // liste des bougie existant
	// print_r($events);

	echo "<form action=\"".$url."/Bougie/update/".$id."\" method=\"post\">";
?>
<form action=<?php echo $url."/Bougie/update"; ?> method="post">
	<div class="mb-3">
	  	<label for="nom"> Nom* </label>
		<input type="input" name="nom" /><br />
	</div>
	<div class="input-group mb-3">
		<p>Collections associées :</p>
		<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
			<input type="radio" class="btn-check" id="btnchecknull" name="collection" value="NULL" checked>
		 	<label class="btn btn-outline-primary" for="btnchecknull">Aucune</label>
		<?php 
		foreach ($collections as $collection) {
			// print_r($collection);
		  echo "<input type=\"radio\" class=\"btn-check\" id=\"btncheck".$collection->nom."\" name=\"collection\" value=\"".$collection->id."\">";
		  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$collection->nom."\">".$collection->nom."</label>";
		}
		  ?>
		</div>
	</div>
	<div class="input-group mb-3">
		<p>Livre associé*</p>
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<?php foreach ($livres as $livre) {
				// print_r($livre);
			  echo "<input type=\"radio\" class=\"btn-check\" id=\"btncheck".$livre->titre."\" name=\"livre\" value=\"".$livre->id."\">";
			  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$livre->titre."\">".$livre->titre."</label>";
			} ?>
		</div>
	</div>
	<div class="input-group mb-3">
		<p>Statut*</p>
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
		  <input type="radio" class="btn-check" name="statut" id="btnadmin" autocomplete="off" value="validée">
		  <label class="btn btn-outline-primary" for="btnadmin">Validée</label>

		  <input type="radio" class="btn-check" name="statut" id="btnmodo" autocomplete="off" value="neutre">
		  <label class="btn btn-outline-primary" for="btnmodo">Neutre</label>

		  <input type="radio" class="btn-check" name="statut" id="btnuser" autocomplete="off" value="rejetée">
		  <label class="btn btn-outline-primary" for="btnuser">Rejetée</label>
		</div>
	</div>
	<input type="submit" class="btn btn-primary" name="submitBougie" value="Ajouter la bougie" />
</form>