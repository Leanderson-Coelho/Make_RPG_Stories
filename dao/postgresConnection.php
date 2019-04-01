<?php

	function getConnection(){
		$connection = pg_connect("host=localhost port=5432 dbname=makerpg user=postgres password=postgres");
	}

	function closeConnection(){
		pg_close($connection);
	}

?>