<?php 
require_once __DIR__ ."/../vendor/autoload.php";

$login = $_POST['cLogin'];
$senha = $_POST['cSenha'];
$nome = $_POST['nomeUsuario'];

validar($login,$senha,$nome);


function cadastrar($login,$senha,$nome){
	$collection = (new MongoDB\Client)->makerpg->usuario;
	$document = [
		'login' => $login,
		'senha' => $senha,
		'nomeUsuario' => $nome
	];
	$collection->insertOne($document);
}

function validar($login,$senha,$nome){
	if(!isset($login) || !isset($senha) || !isset($nome)){
		return header('location:../login.php');
	}else{
		cadastrar($login,$senha,$nome);
	}
}

header('location:../login.php');

?>