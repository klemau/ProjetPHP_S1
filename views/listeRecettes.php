<?php 

echo '<ul>';

foreach ($content as $recette){
    echo '<li> '.$recette->nom_bougie.' = '.$recette->nom_odeur.'</li>';
}
echo '</ul>';

?>
