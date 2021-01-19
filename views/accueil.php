<?php 
echo "HW "; 
$var1 = "test";
echo $var1;
echo ", ";
echo '<ul>';
foreach ($tabMail as $value){
    echo '<li> - '.$value.'</li>';
}
echo '</ul>';
?>