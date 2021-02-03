<?php 
	global $url;
?>

<form action=<?php echo $url."/Odeur/create"; ?> method="post">
	<div class="mb-3">
		<label for="nom"> Nom de l'évenement </label>
		<input type="input" name="nom" /><br />
	</div>
	<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
	  <input type="radio" class="btn-check" name="role" id="btnadmin" autocomplete="off" value="2" <?php echo $admin_status;?> >
	  <label class="btn btn-outline-primary" for="btnadmin">Administrateur</label>

	  <input type="radio" class="btn-check" name="role" id="btnmodo" autocomplete="off" value="1" <?php echo $modo_status;?> >
	  <label class="btn btn-outline-primary" for="btnmodo">Modérateur</label>

	  <input type="radio" class="btn-check" name="role" id="btnuser" autocomplete="off" value="0" <?php echo $user_status;?> >
	  <label class="btn btn-outline-primary" for="btnuser">Utilisateur</label>
	</div>
<input type="submit" class="btn btn-primary" name="submitOdeur" value="Ajouter l'évenement" />
</form>