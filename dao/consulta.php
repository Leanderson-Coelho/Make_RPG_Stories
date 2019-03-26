<?php
	include('postgresConnection.php');
	// echo 'ta indo';

	// var_dump($connection);

	$result = pg_query($connection, "SELECT * FROM usuario");

	if($result && $row = pg_fetch_array($result)){
		echo $row['nick'];
	}	
?>