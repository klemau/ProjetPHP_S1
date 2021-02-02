<?php 
global $url;

	if($content != NULL){
		// print_r($content);
		$nom=$content['bougie']->nom;
		$id = $content['bougie']->id;
		$eventsBougie=$content['bougie']->events; //liste des event déjà lie à la bougie
		// print_r($eventsBougie);

		$events=$content['events']; // liste des event existant
		// print_r($events);

		foreach ($events as $event) {
			$tabEventsLie[$event->id] = 'unchecked';
		}

		foreach ($eventsBougie as $event) {
			$tabEventsLie[$event['id']] = 'checked';
		}
		print_r($tabEventsLie);
		// $admin_status = 'unchecked';
		// $modo_status = 'unchecked';
		// $user_status = 'unchecked';

		// //regarde quel est le rôle de base de l'utilisateur
		// if ($role == 2) {
		// 	$admin_status = 'checked';
		// } else if ($role == 1) {
		// 	$modo_status = 'checked';
		// } else {
		// 	$user_status = 'checked';
		// }


		echo "<h3> Lier ".$nom."</h3>";
	}
	// echo "<form action=\"$url/User/update/$id\" method=\"post\">";
?>
	<div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
	<?php 
	foreach ($events as $event) {
		// print_r($event);
	  echo "<input type=\"checkbox\" class=\"btn-check\" id=\"btncheck".$event->nom."\" value=\"".$event->id."\" ".$tabEventsLie[$event->id].">";
	  echo "<label class=\"btn btn-outline-primary\" for=\"btncheck".$event->nom."\">".$event->nom."</label>";
	}
	  ?>
	</div>
	<input type="submit" class="btn btn-primary" name="submit" value="Modifier les liens" />
</form>