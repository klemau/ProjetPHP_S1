<?php 
	if($content != NULL){
		// print_r($content);
		$login=$content->login;
		$role=$content->role;
		$id = $content->id;
		echo "<h3> Modifier ".$login."</h3>";
	}
	echo "<form action=\"../../User/update/$id\" method=\"post\">";
?>
	<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
	  <input type="radio" class="btn-check" name="btnadmin" id="btnadmin" autocomplete="off" value="2">
	  <label class="btn btn-outline-primary" for="btnadmin">Administrateur</label>

	  <input type="radio" class="btn-check" name="btnmodo" id="btnmodo" autocomplete="off" value="1">
	  <label class="btn btn-outline-primary" for="btnmodo">Modérateur</label>

	  <input type="radio" class="btn-check" name="btnuser" id="btnuser" autocomplete="off" value="0">
	  <label class="btn btn-outline-primary" for="btnuser">Utilisateur</label>
	</div>
	<input type="submit" class="btn btn-primary" name="role" value="Modifier l'utilisateur" />
</form>
