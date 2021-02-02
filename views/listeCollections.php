<?php 

// echo '<ul>';

// foreach ($content as $collection){
//     echo '<li> '.$collection->nom.' = '.$collection->id.'</li>';
// }
// echo '</ul>';

?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $collection){
    echo '<tr>';
    echo '<td> #'.$collection->id.'</td>';
    echo '<td> '.$collection->nom.'</td>';
    echo "<td><form action=\"../Collection/update/$collection->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$collection->nom."\"/></form></td>";
    echo "<td><form action=\"../Collection/delete/$collection->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$collection->nom."\"/> </form></td></tr>";
} ?>
</table>