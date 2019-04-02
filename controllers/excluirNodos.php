<?php
require_once __DIR__ ."/../vendor/autoload.php";
$idNode = $_POST['predecessor2'];


if(isset($idNode)){
	apagarNodo($idNode);	
}

function apagarNodo(string $idNode){
	$collection = (new MongoDB\Client)->makerpg->relationships;
	$collection2 = (new MongoDB\Client)->makerpg->nodes;
	$regex = '\b'.$idNode.'e.+|.+e'.$idNode.'\b';
	$result = $collection->findOne(["data.id" => new MongoDB\BSON\Regex($regex)]);
	$collection2->deleteOne(['data.id' => $idNode]);
	do{
		$deleteResult = $collection->deleteOne(['data.id' => $result['data']['id']]);	
		$result = $collection->findOne([
			"data.id" => new MongoDB\BSON\Regex($regex)
		]);
	}while($result);
	
}
header('location:../index.php');	
?>