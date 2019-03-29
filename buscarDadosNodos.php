<?php
require_once __DIR__ ."/vendor/autoload.php";
$collection = (new MongoDB\Client)->makerpg->nodes;
$id = $_GET["predecessor"];
$cursor = $collection->findOne(["data.id"=>$id]);
// echo "descricao='".$cursor["data"]["descricao"]."';";
echo "descricao='".$id."';";
?>