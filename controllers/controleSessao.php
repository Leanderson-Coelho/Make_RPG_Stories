<?php
require_once __DIR__ ."/../vendor/autoload.php";
$collection = (new MongoDB\Client)->makerpg->usuario;
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$cursor = $collection->findOne(['login'=>$login]);
if($cursor['senha']==$senha){
	$_SESSION['login'] = $cursor['login'];
	$_SESSION['senha'] = $cursor['senha'];
	$_SESSION['nomeUsuario'] = $cursor['nomeUsuario'];
	header('location:http://localhost:8080/index.php');
}else{
	header('location:http://localhost:8080/login.php?msgErro=Login inválido');
}
?>