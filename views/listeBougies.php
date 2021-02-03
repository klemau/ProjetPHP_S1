<?php 
global $url;

echo "<form action=\"$url/Bougie/create\" method=\"post\"><input type=\"submit\" class=\"btn btn-info\" name=\"submit\" value=\"Ajouter une Bougie\"/></form>";
?>

<table class="table table-hover">
<tr><th> # </th><th> Nom de la bougie </th><th> Nom du livre </th>

<?php
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th>";
}
?>
<th> Evénements liés </th>
<?php if($modif) {
    echo "<th> Lier à un événement </th><th> Supprimer </th>";
}
?>
</tr>

<?php
foreach ($content as $bougie){
    echo '<tr>';
    echo '<td> #'.$bougie->id.'</td>';
    echo '<td> '.$bougie->nom.'</td>';
    echo '<td> '.$bougie->nom_livre.'</td>';
    if($modif){
        echo "<td><form action=\"$url/Bougie/update/$bougie->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$bougie->nom."\"/></form></td>";
    }
    echo '<td><ul>';    
    foreach($bougie->events as $event){
        echo '<li>'.$event['nom'].'</li>';
    }
    echo '</ul></td>'; 
    if($modif){
        echo "<td><form action=\"$url/Bougie/link/$bougie->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-warning\" name=\"submit\" value=\"Ajouter un événement\"/> </form></td>";
        echo "<td><form action=\"$url/Bougie/delete/$bougie->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$bougie->nom."\"/> </form></td></tr>";
    }
}
?>
</table>