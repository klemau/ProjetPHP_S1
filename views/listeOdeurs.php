<?php 

// echo '<ul>';

// foreach ($content as $odeur){
//     echo '<li> '.$odeur->nom.' = '.$odeur->statut.'</li>';
// }
// echo '</ul>';

?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Statut </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $odeur){
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
    echo "<td><form action=\"../Odeur/update/$odeur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$odeur->nom."\"/></form></td>";
    echo "<td><form action=\"../Odeur/delete/$odeur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$odeur->nom."\"/> </form></td></tr>";
} ?>
</table>