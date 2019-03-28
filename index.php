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
	<link rel="stylesheet" href="css/customMaterialize.css">
	<!-- INICIALIZAÇÃO JQUERY DOS COMPONENTES MATERIALIZE -->
	<script src="js/initialization.js"></script>
</head>
<body>
	<div class="row">
		<div class="col l4" style="border: 1px solid black">
			<div id="cy"></div>
		</div>
		<div class="col l8" style="border: 1px solid black">
			<form action="controllers/criarNodos.php" method="POST">
				<div class="row">
					<input type="text" name="predecessor" hidden readonly id="predecessor">
				</div>
				<div class="row">
					<label>Titulo</label>
					<input id="input" type="text" name="titulo">
				</div>
				<div class="row">
					<label>Descrição</label>
					<input type="text" name="descricao">
				</div>
				<div class="row">
					<div class="col l3 center">
						<input type="submit" name="submit" id="Node" value="Node">disabled
					</div>
					<div class="input-field col l6">
						<select>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
					</div>
					<div class="col l3 center">
						<input class="node" type="button" name="btn-branch" id="branch" value="Branch">
					</div>
				</div>
			</form>	
			<div class="row">
				<div class="container">
					<input type="button" id="trigger-merge" value="Mesclar cards" />
					<div id="merge" style="display: none;">
						<form action="controllers/criarNodos.php" method="POST">
							<div class="row">
								<div class="input-field col l6">
									<p>De:</p>
									<input type="text" readonly id="from" name="from"/>	
								</div>
								<div class="input-field col l6">
									<p>Para:</p>
									<input type="text" readonly name="for" id="for"/>								
								</div>
							</div>
							<div class="input-field">
								<input type="button" id="limpar" value="Limpar"/>
								<input type="submit" name="submit" value="Mesclar"/>
							</div>
						</form>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col l12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title" id="cardTitulo">Card Title</span>
							<p id="cardConteudo">I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.</p>
						</div>
						<!-- <div class="card-action">
							<a href="#">This is a link</a>
							<a href="#">This is a link</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- CARREGA O GRÁFICO -->
	<?php
	include("graph.php");
	?>
	<!-- CONTROLE DE INTERFACE -->
	<script src="js/controleInterface.js"></script>
</body>
</html>
