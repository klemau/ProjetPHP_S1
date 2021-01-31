<?php 

echo '<ul>';

foreach ($content as $odeur){
    echo '<li> '.$odeur->nom.' = '.$odeur->statut.'</li>';
}
echo '</ul>';

?>
