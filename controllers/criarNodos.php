<?php
require_once __DIR__ ."/../vendor/autoload.php";

$acao = $_POST['submit'];


if($acao=="Node"){
	$idNodoAnterior = $_POST['predecessor'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	createNodes($titulo,$descricao,$idNodoAnterior);
}else{
	$idNodoAnterior = $_POST['from'];
	$id = $_POST['for'];
	createEdges($idNodoAnterior,$id);
}

function createNodes(string $titulo, string $descricao, string $idNodoAnterior=""){
	$collection = (new MongoDB\Client)->makerpg->nodes;
	$id=gerarId();
	$nodes = [
		'data'=> [
			'id'=>$id,
			'titulo'=>$titulo,
			'descricao'=>$descricao
		],
	];
	$collection->insertOne($nodes);

	if($collection->count()>1){
		createEdges($idNodoAnterior, $id);
	}
}

function createEdges($idNodoAnterior, $id){

	$collection = (new MongoDB\Client)->makerpg->relationships;	
	// Verificando se já existe relação
	$condicao = [
		'data.id' => $idNodoAnterior."e".$id,
	];
	$busca = $collection->findOne($condicao);
	if($busca==null){
		$edge = [
			'data'=>[
				'id'=>$idNodoAnterior."e".$id,
				'source'=>$idNodoAnterior,
				'target'=>$id
			],
		];
		$collection->insertOne($edge);
	}
	
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
header('location:../index.php');
?>