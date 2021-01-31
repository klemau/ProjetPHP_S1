<?php 
echo '<ul>';
foreach ($content as $user){
    echo '<li> '.$user->login.' = '.$user->role.'</li>';
}
echo '</ul>';

?>
