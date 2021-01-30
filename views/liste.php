<?php 



echo '<ul>';

foreach ($content as $bougie){
    echo '<li> '.$bougie->nom.' = '.$bougie->id.'</li>';
}
echo '</ul>';

?>
