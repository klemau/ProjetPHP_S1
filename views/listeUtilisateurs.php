<!-- Dans l'idéal, un message de confirmation / d'infirmation sur l'action effectuée sur la bdd -->
<!-- ?php 
	if($content != NULL){
		echo "<h3>".$content."</h3>";
	}
?> -->

<table class="table table-hover">
<tr><th> # </th><th> Identifiant </th><th> Rôle </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $user){
	if($user->role == 2)
	{
		$role = "Administrateur";
	}
	else if($user->role == 1)
	{
		$role = "Modérateur";
	}
	else 
	{
		$role = "Utilisateur";
	}

    echo "<tr>";
    echo "<td> #".$user->id."</td>";
    echo "<td> ".$user->login."</td>";
    echo "<td> ".$role."</td>";
    echo "<td><form action=\"../User/update/$user->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$user->login."\"/></form></td>";
    echo "<td><form action=\"../User/delete/$user->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$user->login."\"/> </form></td>";
    echo "</tr>";
} ?>
</table>