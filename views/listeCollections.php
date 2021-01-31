<?php 

echo '<ul>';

foreach ($content as $collection){
    echo '<li> '.$collection->nom.' = '.$collection->id.'</li>';
}
echo '</ul>';

?>
