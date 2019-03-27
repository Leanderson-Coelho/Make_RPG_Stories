<?php
	require_once __DIR__ ."/vendor/autoload.php";

	$db = (new MongoDB\Client)->makerpg->relationships;

	$doc = [
		'data'=> [
			'id'=>'12', 'source'=> '1', 'target'=> '2' 
		],
	];

	$db->insertOne($doc);
	echo 'foi';
?>