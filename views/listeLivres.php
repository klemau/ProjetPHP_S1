<?php 

echo '<ul>';

foreach ($content as $livre){
    echo '<li> '.$livre->titre.' = '.$livre->nom_auteur.'</li>';
}
echo '</ul>';

?>
