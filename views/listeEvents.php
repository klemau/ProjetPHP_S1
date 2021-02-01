<?php 

echo '<ul>';
foreach ($content as $event){
    echo '<li> '.$event->nom.' = '.$event->id.'; '.count($event->bougies).' bougies liees</li>';
}
echo '</ul>';

?>
