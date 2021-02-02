
<table class="table table-hover">
<tr><th> # </th><th> Identifiant </th><th> Rôle </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $user){
global $url;
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
    echo "<td><form action=\"$url/User/update/$user->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$user->login."\"/></form></td>";
    echo "<td><form action=\"$url/User/delete/$user->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$user->login."\"/> </form></td>";
    echo "</tr>";
} ?>
</table>