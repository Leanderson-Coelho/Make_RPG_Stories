<?php
require_once __DIR__ ."/vendor/autoload.php";
$collection = (new MongoDB\Client)->makerpg->nodes;
$id = "2";//$_POST['predecessor'];
$cursor = $collection->findOne(["data.id"=>$id]);
if ($cursor) {
    echo "descricao='".$cursor["data"]["descricao"]."';";
} else {
    echo "{ 'status' : 'false' }";
}
?>