<?php 

echo '<ul>';

foreach ($content as $bougie){
    echo '<li> '.$bougie->nom.' = '.$bougie->nom_livre.'</li>';
}
echo '</ul>';

?>
