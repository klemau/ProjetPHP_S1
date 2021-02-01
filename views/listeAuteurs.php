<?php 

echo '<ul>';

foreach ($content as $auteur){
    echo '<li> '.$auteur->nom.' = '.$auteur->id.'</li>';
}
echo '</ul>';

?>
