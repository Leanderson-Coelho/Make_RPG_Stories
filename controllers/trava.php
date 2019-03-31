<?php
session_start();
if(!isset($_SESSION['login'])){
	header("location:http://localhost:8080/login.php?msgErro=Login inválido");
}
?>