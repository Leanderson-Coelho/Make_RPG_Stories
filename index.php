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
		<div class="col s10 l4 push-l1 card z-depth-5 painelExibicao cards-principais">
			<div class="row grapHeader"><h3 class="container graphTitle">Cria e conecte seus cards !</h3></div>
			<div id="cy"></div>
		</div>
		<div class="col l6 push-l1 card z-depth-5 painelCriacao cards-principais">
			<form action="controllers/criarNodos.php" method="POST">
				<div class="row">
					<input type="text" name="predecessor" hidden readonly id="predecessor">
				</div>
				<div class="row">
					<div class="col l12 input-field">
						<i class="material-icons prefix">title</i>
						<input id="titulo" type="text" name="titulo">
						<label for="titulo">Titulo</label>
					</div>
				</div>
				<div class="row">
					<div class="col l12 input-field">
						<i class="material-icons prefix">description</i>
						<input id="descricao" type="text" name="descricao">
						<label for="descricao">Descrição</label>
					</div>
				</div>
				<div class="row">
					<div class="col l3 center">
						<button class="btn waves-effect waves-light" type="submit" name="submit" value="Node" id="Node" >Criar Card</button>
					</div>
					<div class="input-field col l6">
						<select>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
					</div>
					<div class="col l3 center">
						<button class="btn waves-effect waves-light" type="button" name="submit" value="criarNodos" id="trigger-merge">Unir Ramificação</button>
					</div>
				</div>
			</form>	
			<div class="row">
				<div class="container">
					
					<div id="merge" style="display: none;">
						<form action="controllers/criarNodos.php" method="POST">
							<div class="row">
								<div class="input-field col l6">
									<b class="text-color"  style="background-color: #B8860B;">De:</b>
									<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
									<input type="text" readonly id="fromUsuario" name="fromUsuario"/>
									<!-- CAMPO QUE É ENVIADO NO FORMULÁRIO -->
									<input type="text" readonly hidden id="from" name="from"/>	
								</div>
								<div class="input-field col l6">
									<b class="text-color"  style="background-color: #DAA520;">Para:</b>
									<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
									<input type="text" readonly name="forUsuario" id="forUsuario"/>
									<!-- CAMPO QUE É ENVIADO NO FORMULÁRIO -->
									<input type="text" readonly hidden name="for" id="for"/>
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
					<div class="card cardDescricao blue-grey darken-1">
						<div class="card-content white-text cardCollapsible">
							<ul class="collapsible">
								<li>
									<div class="collapsible-header"><b><span id="cardTitulo">Selecione um Card</span></b></div>
									<div class="collapsible-body blue-grey lighten-2"><span id="cardConteudo"></span></div>
								</li>								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row" >
			<div class="col l6 push-l1 cards-principais z-depth-5 card chat" style="background-color: #fff">
				<div class="row msgRecebidas">
						I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.
							I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.
							I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.
							I am a very simple card. I am good at containing small bits of information.
					
				</div>
				<div class="row msgEnviada">
					<div class="input-field">
						<i class="material-icons right prefix">send</i>
						<input  id="msgChat" type="text" name="mensagem" />

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
