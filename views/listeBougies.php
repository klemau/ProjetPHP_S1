<?php 

echo '<ul>';

foreach ($content as $bougie){
    echo '<li> '.$bougie->nom.' = '.$bougie->nom_livre.' ; '.count($bougie->events).' events lies</li>';
}
echo '</ul>';

?>
