<!DOCTYPE>
<html>
<head>
    <title>Make RPG Stories</title>
    <!-- CYTOSCAPE -->
    <!-- START -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" />
    <script src="js/cytoscape.min.js"></script>
    <script src="js/dagre.min.js"></script>
    <script src="js/cytoscape-dagre.js"></script>
    <!-- END -->
    <!-- CYTOSCAPE -->
    <!-- JQUERY -->
    <script src="js/JQuery.js"></script>
    <!-- MATERIALIZE CSS-->
    <link rel="stylesheet" href="css/materialize.css">
    <!-- MATERIALIZE JS -->
    <script src="js/materialize.js"></script>
    <!-- ICONS MATERIALIZA -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <!-- CUSTOM -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="row">
        <div class="col l4" style="border: 1px solid black">
            <div id="cy"></div>
        </div>
        <div class="col l8" style="border: 1px solid black">
			<div class="row">
				<label>Titulo</label>
				<input type="text" name="titulo">
			</div>
			<div class="row">
				<label>Descrição</label>
				<input type="text" name="descricao">
			</div>
			<div class="row">
				<div class="col l3 center">
					<input type="submit" name="btn-node" value="Node">
				</div>
				<div class="input-field col l6">
					<select>
						<option value="1">Cajazeiras</option>
						<option value="2">Itaporanga</option>
						<option value="3">Milagres</option>
					</select>
				</div>
				<div class="col l3 center">
					<input type="submit" name="btn-branch" value="Branch">
				</div>
			</div>
		</div>   
    </div>
    <!-- CARREGA O GRÁFICO -->
    <?php
    	include("graph.php");
    ?>
</body>
</html>
