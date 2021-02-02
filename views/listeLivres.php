<?php 

// echo '<ul>';

// foreach ($content as $livre){
//     echo '<li> '.$livre->titre.' = '.$livre->nom_auteur.'</li>';
// }
// echo '</ul>';

?>

<table class="table table-hover">
<tr><th> # </th><th> Titre </th><th> Auteur </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $livre){
    echo '<tr>';
    echo '<td> #'.$livre->id.'</td>';
    echo '<td> '.$livre->titre.'</td>';
    echo '<td> '.$livre->nom_auteur.'</td>';
    echo "<td><form action=\"../Livre/update/$livre->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$livre->titre."\"/></form></td>";
    echo "<td><form action=\"../Livre/delete/$livre->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$livre->titre."\"/> </form></td></tr>";
} ?>
</table>