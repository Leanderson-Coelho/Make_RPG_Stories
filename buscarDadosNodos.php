<?php
require_once __DIR__ ."/vendor/autoload.php";
$collection = (new MongoDB\Client)->makerpg->nodes;
$id = $_POST['id'];
$cursor = $collection->findOne(["data.id"=>$id]);
echo $cursor["data"]["descricao"];
?>