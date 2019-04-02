<?php

	function getConnection(){
		return $connection = pg_connect("host=localhost port=5432 dbname=makerpg user=postgres password=postgres");
	}

	function closeConnection($connection){
		pg_close($connection);
	}

?>