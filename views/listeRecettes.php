<?php 

echo '<ul>';

// foreach ($content as $recette){
//     echo '<li> '.$recette->nom_bougie.' = '.$recette->nom_odeur.'</li>';
// }
// echo '</ul>';

?>
<table class="table table-hover">
<tr><th> # </th><th> Identifiant </th><th> Rôle </th><th> Modifier </th><th> Supprimer </th></tr>

<?php foreach ($content as $recette){
    echo '<tr><td> #'.$recette->id.'</td><td> '.$recette->nom_bougie.'</td><td> '.$recette->nom_odeur.'</td> <td><form action="../User" method="post"><input type="submit" class="btn btn-primary" name="submit" value="Modifier '.$recette->nom_bougie.'"/></form></td> <td><form action="../User" method="post"><input type="submit" class="btn btn-danger" name="submit" value="Supprimer '.$recette->nom_bougie.'"/> </form></td></tr>';
} ?>
</table>