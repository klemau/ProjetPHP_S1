<?php 

// echo '<ul>';
// foreach ($content as $recette){
//     echo '<li> '.$recette->nom_bougie.' = '.$recette->nom_odeur.'</li>';
// }
// echo '</ul>';

?>
<table class="table table-hover">
<tr><th> # </th><th> Nom de la bougie </th><th> Nom de l'odeur </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $recette){
    echo '<tr>';
    echo '<td> #'.$recette->id.'</td>';
    echo '<td> '.$recette->nom_bougie.'</td>';
    echo '<td> '.$recette->nom_odeur.'</td>';
    echo "<td><form action=\"../Recette/update/$recette->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$recette->nom_bougie."\"/></form></td>";
    echo "<td><form action=\"../Recette/delete/$recette->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$recette->nom_bougie."\"/> </form></td></tr>";
} ?>
</table>