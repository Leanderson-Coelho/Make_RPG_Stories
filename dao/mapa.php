<?php 
	require('postgresConnection.php');
	$connection = getConnection();

	$queryViewBox = "SELECT getViewBox() as svg";
	$viewBox = pg_query($connection, $queryViewBox);

	$queryGeomCidades = "SELECT ST_AsSVG(geom) as svg,nome from regiao";
	$GeomCidades = pg_query($connection,$queryGeomCidades);

	$queryNomesCidades = "SELECT nome FROM regiao";
	$nomesCidades = pg_query($connection,$queryNomesCidades);
	
	$viewBox = pg_fetch_array($viewBox);

	closeConnection($connection);
?>

	