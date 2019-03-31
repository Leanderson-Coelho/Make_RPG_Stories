<?php include("controllers/trava.php");?>
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
	<!-- CSS DEFAULT -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<!-- CUSTOM -->
	<link rel="stylesheet" href="css/customMaterialize.css">
	<!-- INICIALIZAÇÃO JQUERY DOS COMPONENTES MATERIALIZE -->
	<script src="js/initialization.js"></script>
</head>
<body >
	<div class="row myBody">
		<div class="fixed-action-btn">
			<a class="btn-floating btn-large red">
				<i class="large material-icons">menu</i>
			</a>
			<ul>
				<li><a class="btn-floating blue modal-trigger" data-target="PERFIL"><i class="material-icons">perm_identity</i></a></li>
				<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
				<li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
				<li><a href="#SAIR" class="btn-floating red modal-trigger"><i class="material-icons">close</i></a></li>
			</ul>
		</div>
		<div class="col s10 l4 push-l1 card z-depth-5 painelExibicao cards-principais">
			<div class="row grapHeader"><h3 class="container graphTitle">Cria e conecte seus cards !</h3></hr></div>
			<div id="cy"></div>
		</div>
		<div class="col l6 push-l1 card z-depth-5 painelCriacao cards-principais">
			<form action="controllers/criarNodos.php" method="POST">
				<div class="row">
					<input type="text" name="predecessor" hidden readonly id="predecessor">
				</div>
				<div class="row">
					<div class="col s12 m12 l12 input-field">
						<i class="material-icons prefix">title</i>
						<input id="titulo" required type="text" name="titulo">
						<label for="titulo">Titulo</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m12 l12 input-field">
						<i class="material-icons prefix">description</i>
						<input id="descricao" maxlength="650" required type="text" name="descricao">
						<label for="descricao">Descrição</label>
					</div>
				</div>
				<div class="row">
					<div class="col l3 center divNode">
						<button class="btn waves-effect waves-light" type="submit" name="submit" id="Node" disabled value="Node">Criar Card</button>
					</div>
					<div class="input-field container col s12 l6">
						<select>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
					</div>
					<div class="col l3 center divBranch">
						<button class="btn waves-effect waves-light" type="button" id="trigger-merge" style="width: 100%;" value="Branch" disabled>Unir Ramificação</button>
					</div>
				</div>
			</form>	
			<div class="row">
				<div class="container">
					<div id="merge" style="display: none;">
						<form action="controllers/criarNodos.php" method="POST">
							<div class="row">
								<div class="input-field col s12 m12 l6">
									<b class="text-color"  style="background-color: #B8860B;">De:</b>
									<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
									<input type="text" readonly id="fromUsuario" name="fromUsuario"/>
									<!-- CAMPO QUE É ENVIADO NO FORMULÁRIO -->
									<input type="text" readonly hidden id="from" name="from"/>	
								</div>
								<div class="input-field col s12 m12 l6">
									<b class="text-color"  style="background-color: #DAA520;">Para:</b>
									<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
									<input type="text" readonly name="forUsuario" id="forUsuario"/>
									<!-- CAMPO QUE É ENVIADO NO FORMULÁRIO -->
									<input type="text" readonly hidden name="for" id="for"/>
								</div>
							</div>
							<div class="input-field">
								<!-- <input class="btn waves-effect waves-light" type="button" id="limpar" value="Limpar"/> -->
								<button class="btn waves-effect waves-light" type="button" id="limpar">Limpar</button>
								<!-- <input class="btn waves-effect waves-light" type="submit" name="submit" value="Mesclar"/> -->
								<button class="btn waves-effect waves-light" type="submit" name="submit" id="mesclar" disabled>Mesclar</button>
							</div>
						</form>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12 ">
					<div class="card cardDescricao blue-grey darken-1">
						<div class="card-content white-text cardCollapsible">
							<ul class="collapsible ulCollapsible">
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
				<div class="row msgRecebidas" id="msgRecebidas">

				</div>
				<div class="row msgEnviada">
					<div class="input-field msgEnviadaCol">
						<form id="form">
							<i class="material-icons right prefix">send</i>
							<input  id="msgChat" type="text" name="mensagem" />
							<input type="text" id="usuario" hidden value=<?php echo $_SESSION['nomeUsuario'] ?> />
							<input type="submit" name="submit" hidden value="enviar"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- MODALS -->
		<div id="PERFIL" class="modal bottom-sheet">
			<div class="modal-content">
				<h4>Modal Header</h4>
				<p>A bunch of text</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
		<!--  -->
	</div>

	<!-- CARREGA O GRÁFICO -->
	<?php
	include("graph.php");
	?>
	<!-- CONTROLE DE INTERFACE -->
	<script src="js/controleInterface.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
	<!-- <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script> -->
	
	<script src="js/chat.js"></script>
</body>
</html>
<div id="SAIR" class="modal">
	<div class="modal-content">
		<h4>Deseja sair do Make RPG</h4>
	</div>
	<div class="modal-footer">
		<a href="controllers/logout.php" class="modal-close waves-effect waves-green btn-flat">Sim</a>
		<a href="#" class="modal-close waves-effect waves-green btn-flat">Não</a>
	</div>
</div>