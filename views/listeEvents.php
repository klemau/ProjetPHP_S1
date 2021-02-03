<?php 
global $url;

echo "<form action=\"$url/Event/create\" method=\"post\"><input type=\"submit\" class=\"btn btn-info\" name=\"submit\" value=\"Ajouter un Event\"/></form>";
?>

<table class="table table-hover">
<tr><th> # </th><th> Nom </th>

<?php
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th>";
}
?>
<th> Bougies liées </th>
<?php if($modif) {
    echo "<th> Ajouter une bougie </th><th> Supprimer </th>";
}
?>
</tr>

<?php foreach ($content as $event){
    echo '<tr>';
    echo '<td> #'.$event->id.'</td>';
    echo '<td> '.$event->nom.'</td>';
    if($modif){
        echo "<td><form action=\"$url/Event/update/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$event->nom."\"/></form></td>";
    }
    echo '<td><ul>';
    foreach($event->bougies as $bougie){
        echo '<li>'.$bougie['nom'].'</li>';
    }
    echo '</ul></td>'; 
    if($modif){
        echo "<td><form action=\"$url/Event/link/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-warning\" name=\"submit\" value=\"Ajouter une bougie\"/></form></td>";
        echo "<td><form action=\"$url/Event/delete/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$event->nom."\"/> </form></td>";
    }
} 
?>
</tr>
</table>