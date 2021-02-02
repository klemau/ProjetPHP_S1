<?php 

// echo '<ul>';
// foreach ($content as $event){
//     echo '<li> '.$event->nom.' = '.$event->id.'; '.count($event->bougies).' bougies liees</li>';
// }
// echo '</ul>';

?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Nombre de bougies liées </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $event){
    echo '<tr>';
    echo '<td> #'.$event->id.'</td>';
    echo '<td> '.$event->nom.'</td>';
    echo '<td> '.count($event->bougies).'</td>';
    echo "<td><form action=\"../Event/update/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$event->nom."\"/></form></td>";
    echo "<td><form action=\"../Event/delete/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$event->nom."\"/> </form></td></tr>";
} ?>
</table>