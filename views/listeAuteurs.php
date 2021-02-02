<?php 

// echo '<ul>';

// foreach ($content as $auteur){
//     echo '<li> '.$auteur->nom.' = '.$auteur->id.'</li>';
// }
// echo '</ul>';

?>
<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $auteur){
    echo '<tr>';
    echo '<td> #'.$auteur->id.'</td>';
    echo '<td> '.$auteur->nom.'</td>';
    echo "<td><form action=\"../Auteur/delete/$auteur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$auteur->nom."\"/></form></td>";
    echo "<td><form action=\"../Auteur/delete/$auteur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$auteur->nom."\"/> </form></td></tr>";
} ?>
</table>