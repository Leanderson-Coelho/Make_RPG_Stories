<?php
	require_once __DIR__ ."/vendor/autoload.php";

	$db = (new MongoDB\Client)->makerpg->nodes;

	$doc = [
		'data'=> [
			'id'=>'3' 
		],
		'tipo'=>'novoNodo',
	];

	$db->insertOne($doc);
	echo 'foi';
?>