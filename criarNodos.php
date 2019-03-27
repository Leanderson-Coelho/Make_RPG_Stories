<?php
require_once __DIR__ ."/vendor/autoload.php";


createNodes("Qualquer coisa2", "1");
function createNodes(string $titulo, string $idNodoAnterior=""){
	$collection = (new MongoDB\Client)->makerpg->nodes;
	$id=gerarId();
	$nodes = [
		'data'=> [
			'id'=>$id
		],
		'titulo'=>$titulo,
	];
	$collection->insertOne($nodes);

	if($collection->count()>1){
		createEdges($idNodoAnterior, $id);
	}
}
function createEdges($idNodoAnterior, $id){
	$collection = (new MongoDB\Client)->makerpg->relationships;	
	$edge = [
		'data'=>[
			'id'=>$idNodoAnterior."e".$id,
			'source'=>$idNodoAnterior,
			'target'=>$id
		],
	];
	$collection->insertOne($edge);
}

function gerarId(){
	$collection = (new MongoDB\Client)->makerpg->count;

	if($collection->count()!=1){
		$a = 1;
		$cont = [
			'_id'=>'userid',
			'seq'=>1
		];
		$collection->insertOne($cont);
	}else{
		$cont = $collection->findOne(['_id'=>'userid']);
		$a = $cont['seq'];
		$a = $a + 1;
		$collection->deleteOne(['_id' => 'userid']);
		$collection->insertOne([
			'_id'=>'userid',
			'seq'=>$a
		]);
	}
	return (string)$a;
}

?>