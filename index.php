<!DOCTYPE>
<!-- This code is for demonstration purposes only.  You should not hotlink to Github, Rawgit, or files from the Cytoscape.js documentation in your production apps. -->
<html>
<head>
	<title>cytoscape-dagre.js demo</title>
	<!-- CYTOSCAPE -->
	<!--  -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" />
	<script src="js/cytoscape.min.js"></script>
	<script src="js/dagre.min.js"></script>
	<script src="js/cytoscape-dagre.js"></script>
	<!-- CYTOSCAPE -->
	<!--  -->
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col l4" style="border: 1px solid black">
			TESTE
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
	<!-- Load application code at the end to ensure DOM is loaded -->
	<!-- <script src="js/code.php"></script> -->
	<script type="text/javascript">

		$( document ).ready(function() {
			var cy = window.cy = cytoscape({
				container: document.getElementById('cy'),

				boxSelectionEnabled: false,
				autounselectify: true,

				layout: {
					name: 'dagre'
				},

				style: [
				{
					selector: 'node',
					style: {
						'content': 'data(id)',
						'text-opacity': 0.5,
						'text-valign': 'center',
						'text-halign': 'right',
						'background-color': '#11479e',
						'width': 10,
						'height': 10
					}
				},

				{
					selector: 'edge',
					style: {
						'curve-style': 'bezier',
						'width': 1.5,
						'target-arrow-shape': 'triangle',
						'line-color': '#9dbaea',
						'target-arrow-color': '#9dbaea',
					}
				}
				],

				elements: {
					nodes: [
					<?php include("js/data.php") ?>
					],
					edges: [

					]
				},
			});
			cy.zoomingEnabled(false);
		});

	</script>

</body>
</html>
