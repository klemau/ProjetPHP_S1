<table class="table table-hover">
<tr><th> # </th><th> Titre </th><th> Auteur </th>

<?php
global $url;
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th><th> Supprimer </th>";
}
echo "</tr>";
?>

<?php
foreach ($content as $livre){
    echo '<tr>';
    echo '<td> #'.$livre->id.'</td>';
    echo '<td> '.$livre->titre.'</td>';
    echo '<td> '.$livre->nom_auteur.'</td>';
    if($modif){ 
        echo "<td><form action=\"$url/Livre/update/$livre->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$livre->titre."\"/></form></td>";
        echo "<td><form action=\"$url/Livre/delete/$livre->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$livre->titre."\"/> </form></td></tr>";
    }
}
?>
</table>