<?php 

// echo '<ul>';

// foreach ($content as $bougie){
//     echo '<li> '.$bougie->nom.' = '.$bougie->nom_livre.' ; '.count($bougie->events).' events lies</li>';
// }
// echo '</ul>';

?>

<table class="table table-hover">
<tr><th> # </th><th> Nom de la bougie </th><th> Nom du livre </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $bougie){
    echo '<tr>';
    echo '<td> #'.$bougie->id.'</td>';
    echo '<td> '.$bougie->nom.'</td>';
    echo '<td> '.$bougie->nom_livre.'</td>';
    echo "<td><form action=\"../Bougie/update/$bougie->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$bougie->nom."\"/></form></td>";
    echo "<td><form action=\"../Bougie/delete/$bougie->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$bougie->nom."\"/> </form></td></tr>";
} ?>
</table>