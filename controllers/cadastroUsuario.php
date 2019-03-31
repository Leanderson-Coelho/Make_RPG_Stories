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
	return header('location:../login.php?msg=Cadastro efetuado!');
}

function validar($login,$senha,$nome){
	if(isset($_POST['cLogin']) || isset($_POST['cSenha']) || isset($_POST['nomeUsuario'])){
		return header("location:../login.php?msgErro=Preencha todos os campos");
	}else{
		cadastrar($login,$senha,$nome);
	}
}
?>