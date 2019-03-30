<?php
require_once __DIR__ ."/../vendor/autoload.php";
$collection = (new MongoDB\Client)->makerpg->nodes;
echo $collection->count();
?>