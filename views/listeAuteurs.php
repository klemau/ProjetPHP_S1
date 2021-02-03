<?php 
global $url;

echo "<form action=\"$url/Auteur/create\" method=\"post\"><input type=\"submit\" class=\"btn btn-info\" name=\"submit\" value=\"Ajouter un Auteur\"/></form>";
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
foreach ($content as $auteur){
    echo '<tr>';
    echo '<td> #'.$auteur->id.'</td>';
    echo '<td> '.$auteur->nom.'</td>';
    if($modif){
        echo "<td><form action=\"$url/Auteur/update/$auteur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$auteur->nom."\"/></form></td>";
        echo "<td><form action=\"$url/Auteur/delete/$auteur->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$auteur->nom."\"/> </form></td></tr>";
    }
}
?>
</table>