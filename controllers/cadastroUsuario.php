<?php 
require_once __DIR__ ."/../vendor/autoload.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nomeUsuario'];

validar($email,$senha,$nome);


function cadastrar($email,$senha,$nome){
	$collection = (new MongoDB\Client)->makerpg->usuarios;
	$document = [
		'email' => $email,
		'senha' => $senha,
		'nome' => $nome
	];
	$collection->insertOne($document);
}

function validar($email,$senha,$nome){
	if(!isset($email) || !isset($senha) || !isset($nome)){
		return header('location:../login.php');
	}else{
		cadastrar($email,$senha,$nome);
	}
}

header('location:../login.php');

?>