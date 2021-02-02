<?php 
	if($content != NULL){
		// print_r($content);
		$login=$content->login;
		$role=$content->role;
		$id = $content->id;

		$admin_status = 'unchecked';
		$modo_status = 'unchecked';
		$user_status = 'unchecked';

		//regarde quel est le rôle de base de l'utilisateur
		if ($role == 2) {
			$admin_status = 'checked';
		} else if ($role == 1) {
			$modo_status = 'checked';
		} else {
			$user_status = 'checked';
		}
		echo "<h3> Modifier ".$login."</h3>";
	}
	echo "<form action=\"../../User/update/$id\" method=\"post\">";
?>
	<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
	  <input type="radio" class="btn-check" name="role" id="btnadmin" autocomplete="off" value="2" <?php echo $admin_status;?> >
	  <label class="btn btn-outline-primary" for="btnadmin">Administrateur</label>

	  <input type="radio" class="btn-check" name="role" id="btnmodo" autocomplete="off" value="1" <?php echo $modo_status;?> >
	  <label class="btn btn-outline-primary" for="btnmodo">Modérateur</label>

	  <input type="radio" class="btn-check" name="role" id="btnuser" autocomplete="off" value="0" <?php echo $user_status;?> >
	  <label class="btn btn-outline-primary" for="btnuser">Utilisateur</label>
	</div>
	<input type="submit" class="btn btn-primary" name="submit" value="Modifier l'utilisateur" />
</form>
