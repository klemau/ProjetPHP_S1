<?php 
global $url;

echo "<form action=\"$url/Collection/create\" method=\"post\"><input type=\"submit\" class=\"btn btn-info\" name=\"submit\" value=\"Ajouter une Collection\"/></form>";
?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th>

<?php
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th><th> Supprimer </th>";
}
echo "</tr>";
?>

<?php
foreach ($content as $collection){
    echo '<tr>';
    echo '<td> #'.$collection->id.'</td>';
    echo '<td> '.$collection->nom.'</td>';
    if($modif){
        echo "<td><form action=\"$url/Collection/update/$collection->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$collection->nom."\"/></form></td>";
        echo "<td><form action=\"$url/Collection/delete/$collection->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$collection->nom."\"/> </form></td></tr>";
    }
}
?>
</table>