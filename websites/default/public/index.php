<?php
require '../autoload.php';
$routes = new \fothebysDatabase\Routes();
$entryPoint = new \databaseAccess\EntryPoint($routes);
$entryPoint->run();
?>
