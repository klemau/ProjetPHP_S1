 <?php /*if(!isset($_SESSION)){ session_start();}*/ ?>
<?php /*if (isset($_SESSION['login']) && isset($_SESSION['password'])):*/ ?>
	<p>Vous êtes déjà connecté</p>
<?php /*else:*/ ?>
	<label for="login"> Login de l'utilisateur </label>
	<input type="input" name="login" /><br />

	<label for="password"> Mot de passe </label>
	<input type="password" name="password" /><br />

	<input type="submit" class="btn btn-primary" name="submit" value="Connexion" />

	</form>
<?php /*endif*/ ?>