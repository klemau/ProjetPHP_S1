<table class="table table-hover">
<tr><th> # </th><th> Nom </th><th> Nombre de bougies liées </th>

<?php
global $url;
$modif = isset($_SESSION['role']) && $_SESSION['role']>0;
if($modif) {
    echo "<th> Modifier </th><th> Supprimer </th>";
}
echo "</tr>";
?>

<?php foreach ($content as $event){
    echo '<tr>';
    echo '<td> #'.$event->id.'</td>';
    echo '<td> '.$event->nom.'</td>';
    echo '<td> '.count($event->bougies).'</td>';
    if($modif){
        echo "<td><form action=\"$url/Event/update/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-primary\" name=\"submit\" value=\"Modifier ".$event->nom."\"/></form></td>";
        echo "<td><form action=\"$url/Event/delete/$event->id\" method=\"post\"><input type=\"submit\" class=\"btn btn-danger\" name=\"submit\" value=\"Supprimer ".$event->nom."\"/> </form></td></tr>";
    }
} 
?>
</table>