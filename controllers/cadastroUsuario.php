<?php 
require_once __DIR__ ."/../vendor/autoload.php";

$login = $_POST['cLogin'];
$senha = $_POST['cSenha'];
$nome = $_POST['nomeUsuario'];

cadastrar($login,$senha,$nome);

function cadastrar($login,$senha,$nome){
	$collection = (new MongoDB\Client)->makerpg->usuario;
	$document = [
		'login' => $login,
		'senha' => $senha,
		'nomeUsuario' => $nome
	];
	$collection->insertOne($document);
	return header('location:../login.php?msg=Cadastro efetuado!');
}

?>