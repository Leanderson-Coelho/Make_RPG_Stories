<?php
	require_once __DIR__ ."/vendor/autoload.php";

	
	createNodes("2", "Qualquer coisa2", "1");
	function createNodes(string $id, string $titulo, string $idNodoAnterior=""){
		$db = (new MongoDB\Client)->makerpg->nodes;

		$nodes = [
			'data'=> [
				'id'=>$id 
			],
			'titulo'=>$titulo,
		];
		$db->insertOne($nodes);

		if($db->count()>1){
			createEdges($idNodoAnterior, $id);
		}
	}
	function createEdges($idNodoAnterior, $id){
		$db = (new MongoDB\Client)->makerpg->edges;	
		$edge = [
			'data'=>[
				'id'=>'e'.$idNodoAnterior."".$id,
				'source'=>$idNodoAnterior,
				'target'=>$id
			],
		];
		$db->insertOne($edge);
	}

?>