<?php
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\">";
echo "<title>".$titre."</title>";
echo "</head>";

echo "<header>";
include('./views/menu.php');
echo "<h1>".$titre."</h1>";
echo "</header>";		 
echo "<body>";
include($link);
echo "</body>";
include('./views/footer.php');
echo "</html>";
?>