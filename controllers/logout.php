<?php
session_start();
// $_SESSION = array();
session_unset();
session_destroy();
header("location:http://localhost:8080/login.php");
?>