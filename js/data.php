<?php
require_once __DIR__ ."/../vendor/autoload.php";

$nodos = (new MongoDB\Client)->makerpg->nodes;

$cursor = $nodos->find();

$conteudo = '';
foreach($cursor as $document){
	$nodo = $document['data'];
	$conteudo = $conteudo. "{ data: 
		{ id: ".$nodo['id']."}
	},";
}

 echo $conteudo;
?>