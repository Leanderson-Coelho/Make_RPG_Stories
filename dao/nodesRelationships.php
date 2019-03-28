<?php
// 			nodesRelationships
// Carrega todos os nós e relações que estão armazenados no banco
// para o script do cytoscape.
// 			$conteudo = guarda toda a formação do json para o script
// 			$nodos = armazena o resultado do 'listar' da coleção que guarda os nodos
// 			$relShips = armazena o resultado do 'listar' da coleção que armazena as relações.


require_once __DIR__ ."/../vendor/autoload.php";

$nodos = (new MongoDB\Client)->makerpg->nodes;

$cursor = $nodos->find();

$conteudo = 'elements: { nodes: [';
foreach($cursor as $document){
	$nodo = $document['data'];
	$conteudo = $conteudo. "{ data: { id: ".$nodo['id'].", titulo:'".$nodo['titulo']."'} },";
}

$conteudo = $conteudo."], edges: [";

$relShips = (new MongoDB\Client)->makerpg->relationships;

$cursor = $relShips->find();

foreach($cursor as $document){
	$relation = $document['data'];
	$conteudo = $conteudo."{ data : { id: ".$relation['id'].", source: ".$relation['source'].", target: ".$relation['target']."} },";
}

$conteudo = $conteudo."] },";

echo $conteudo;
?>