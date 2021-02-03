<?php 
global $url;

	if($content != NULL){
		// print_r($content);
		$nom=$content['event']->nom;
		$id = $content['event']->id;
		$bougiesEvent=$content['event']->bougies; //liste des bougie déjà lie à l'event
		// print_r($eventsBougie);

		$bougies=$content['bougies']; // liste des bougie existant
		// print_r($events);

		foreach ($bougies as $bougie) {
			$tabEventsLie[$bougie->id] = 'unchecked';
		}

		foreach ($bougiesEvent as $bougie) {
			$tabEventsLie[$bougie['id']] = 'checked';
		}
		// print_r($tabEventsLie);

		echo "<h3> Lier ".$nom."</h3>";
	}
	echo "<form action=\"$url/Event/link/$id\" method=\"post\">";
?>
	<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
	<?php 
	foreach ($bougies as $bougie) {
		// print_r($bougie);
	  echo "<input type=\"checkbox\" class=\"btn-check\" id=\"btncheck".$bougie->nom."\" name=\"liens[]\" value=\"".$bougie->id."\" ".$tabEventsLie[$bougie->id].">";
	  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$bougie->nom."\">".$bougie->nom."</label>";
	}
	  ?>
	</div>
	<input type="submit" class="btn btn-primary" name="submitLiens" value="Modifier les liens" />
</form>