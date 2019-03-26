<?php
	require_once __DIR__ ."/vendor/autoload.php";

	$db = (new MongoDB\Client)->teste;

	$doc = [
		'nome'=>'mailson',
		'nick'=>'asdjuasdh',
	];

	$db->usuario->insertOne($doc);
?>