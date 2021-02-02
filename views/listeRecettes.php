<table class="table table-hover">
<tr><th> # </th><th> Nom de la bougie </th><th> Nom de l'odeur </th>

<?php
global $url;
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th><th> Supprimer </th>";
}
echo "</tr>";
?>

<?php 
foreach ($content as $recette) {
    echo '<tr>';
    echo '<td> #'.$recette->id.'</td>';
    echo '<td> '.$recette->nom_bougie.'</td>';
    echo '<td> '.$recette->nom_odeur.'</td>';
    if($modif) {
        echo "<td><form action=\"$url/Recette/update/$recette->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$recette->nom_bougie."\"/></form></td>";
        echo "<td><form action=\"$url/Recette/delete/$recette->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$recette->nom_bougie."\"/> </form></td></tr>";
    }
} 
?>
</table>