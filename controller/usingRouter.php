<?php

use Lib\Router as Router;

$router = new Router($app, "Controllers\\");
$routingConfigFile = "
{
      \"api\": {
      \"testV2\": {
      \"url\": \"/testV2\",
      \"action\": \"Default@Tests\",
      \"method\": \"any\"
    },
    \"plop\": {
      \"test\": {
        \"url\": \"/import\",
        \"action\": \"Default@index\",
        \"method\": \"any\"
      }
    }
  }
}";



$tabRoutingConfig = json_decode($routingConfigFile, true);
if ($tabRoutingConfig != null)
{
    $router->generateRoutes($tabRoutingConfig);
}
else
{
    die('Internal error - Cannot load routing config file');
}
