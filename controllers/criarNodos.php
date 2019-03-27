<?php
	require_once __DIR__ ."/../vendor/autoload.php";

	$predecessor = $_POST['predecessor'];
	$id = $_POST['idNode'];
	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	
	createNodes($id,$titulo,$descricao,$predecessor);
	function createNodes(string $id, string $titulo, string $descricao, string $idNodoAnterior=""){
		$db = (new MongoDB\Client)->makerpg->nodes;

		$nodes = [
			'data'=> [
				'id'=>$id,
				'titulo'=>$titulo,
				'descricao'=>$descricao
			],
			
		];
		$db->insertOne($nodes);

		if($db->count()>1){
			createEdges($idNodoAnterior, $id);
		}
	}
	function createEdges($idNodoAnterior, $id){
		$db = (new MongoDB\Client)->makerpg->relationships;	
		$edge = [
			'data'=>[
				'id'=>''.$idNodoAnterior."".$id,
				'source'=>$idNodoAnterior,
				'target'=>$id
			],
		];
		$db->insertOne($edge);
	}

	header('location:../index.php');

?>