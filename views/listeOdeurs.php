<?php
global $url;

echo "<form action=\"$url/Odeur/create\" method=\"post\"><input type=\"submit\" class=\"btn btn-info\" name=\"submit\" value=\"Ajouter une Odeur\"/></form>";
?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Statut </th>

<?php
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th><th> Supprimer </th>";
}
echo "</tr>";
?>

<?php 
foreach ($content as $odeur) {
	if($odeur->statut == "possess")
	{
		$statut = "Possédé";
	}
	else if($odeur->statut == "wish")
	{
		$statut = "Souhait";
	}
	else 
	{
		$statut = "Idée";
	}

    echo '<tr>';
    echo '<td> #'.$odeur->id.'</td>';
    echo '<td> '.$odeur->nom.'</td>';
    echo '<td> '.$statut.'</td>';
	if($modif){
		echo "<td><form action=\"$url/Odeur/update/$odeur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$odeur->nom."\"/></form></td>";
		echo "<td><form action=\"$url/Odeur/delete/$odeur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$odeur->nom."\"/> </form></td></tr>";
	}
} 
?>
</table>