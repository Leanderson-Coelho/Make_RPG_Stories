<?php include("controllers/trava.php");?>
<?php include("dao/mapa.php");?>
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
	<script type="text/javascript">
		function exibirNome(evt){
			var path = evt['path'];
			var id = path[0].id;
			$("#Cidade").text(id);
		}

		function removerNome(){
			$("#Cidade").text("");
		}
	</script>
</head>
<body >
	<div class="container">
		<div class="row">
			<div class="fixed-action-btn">
				<a class="btn-floating btn-large red">
					<i class="large material-icons">menu</i>
				</a>
				<ul>
					<li><a class="btn-floating blue modal-trigger" data-target="PERFIL"><i class="material-icons">perm_identity</i></a></li>
					<li><a href="#SOBRE" class="btn-floating yellow darken-1 modal-trigger"><i class="material-icons">format_quote</i></a></li>
					<li><a href="#SAIR" class="btn-floating red modal-trigger"><i class="material-icons">close</i></a></li>
				</ul>
			</div>
			<div class="col s10 l4 push-l1 card z-depth-5 painelExibicao cards-principais">
				<div class="row grapHeader"><h5 style="color: grey;" class="container graphTitle">Crie e conecte seus cards !</h5></hr></div>
				<div id="cy"></div>
			</div>
			<div class="col l6 push-l1 card z-depth-5 cards-principais">
				<form action="controllers/criarNodos.php" method="POST">
					<div class="row">
						<input type="text" name="predecessor" hidden readonly id="predecessor">
					</div>
					<div class="row">
						<div class="col s12 m12 l12 input-field">
							<i class="material-icons grey-text prefix">title</i>
							<input id="titulo" required type="text" name="titulo">
							<label for="titulo" class="grey-text">Titulo</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 m12 l12 input-field">
							<i class="material-icons grey-text prefix">description</i>
							<input id="descricao" required type="text" name="descricao">
							<label for="descricao" class="grey-text">Descrição</label>
						</div>
					</div>
					<div class="row">
						<div class="col l3 center divNode">
							<button class="btn waves-effect waves-light" type="submit" name="submit" id="Node" disabled value="Node">Criar Card</button>
						</div>
						<div class="input-field container col s12 l6 center">
							<a href="#MAPA" id="botaoMapa" class="btn modal-trigger waves-effect waves-light"><i class="material-icons">map</i></a>
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
										<!-- <b class="text-color"  style="background-color: #B8860B;">De:</b> -->
										<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
										<input type="text" readonly id="fromUsuario" name="fromUsuario" placeholder="de" />
										<!-- CAMPO QUE É ENVIADO NO FORMULÁRIO -->
										<input type="text" readonly hidden id="from" name="from"/>	
									</div>
									<div class="input-field col s12 m12 l6">
										<!-- <b class="text-color"  style="background-color: #DAA520;">Para:</b> -->
										<!-- CAMPO QUE É MOSTRADO PARA O USUÁIO -->
										<input type="text" readonly name="forUsuario" id="forUsuario" placeholder="para" />
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
				<div class="row" id="merge2">
					<div class="col l12 m6">
						<div class="cardDescricao card blue-grey darken-1">
							<div class="card-content white-text">
								<div class="row">
									<div class="col s10">
										<span class="card-title" id="cardTitulo">Selecione uma parte da história</span>	
									</div>
									<div class="col s1">
										<form action="controllers/excluirNodos.php" method="POST">
											<input type="text" name="predecessor2" hidden readonly id="predecessor2">
											<button class="btn" id="delNode" type="submit" disabled><i class="material-icons">delete</i></button>
										</form>
									</div>
								</div>
								<p id="cardConteudo">Aqui será exibido a descrição</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- MODALS -->
			<div id="PERFIL" class="modal bottom-sheet">
				<div class="modal-content">
					<h4><?php echo $_SESSION['nomeUsuario']; ?></h4>
					<h5><?php echo $_SESSION['login']; ?></h5>
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col l12 chat">
				<div class="row msgRecebidas" id="msgRecebidas">

				</div>
				<hr>
				<div class="row msgEnviada">
					<div class="col s12 msgEnviadaCol">
						<form id="form">
							<div class="input-field">
								<i class="material-icons grey-text right prefix">send</i>
								<input  id="msgChat" autocomplete="off" type="text" name="mensagem" />	
							</div>
							<input type="text" id="usuario" hidden value=<?php echo $_SESSION['nomeUsuario'] ?> />
							<input type="submit" name="submit" hidden value="enviar"/>
						</form>
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
	<script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
	<!-- <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script> -->

	<script src="js/chat.js"></script>
	<div id="SAIR" class="modal">
		<div class="modal-content">
			<h4>Deseja sair do Make RPG</h4>
		</div>
		<div class="modal-footer">
			<a href="#" class="modal-close waves-effect waves-green btn-flat">Não</a>
			<a href="controllers/logout.php" class="modal-close waves-effect waves-green btn-flat">Sim</a>
		</div>
	</div>

	<div id="MAPA" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Veja o mapa da sua história</h4>
		</hr>
		<h6>País: Diagrônia</h6>
		<h6>Cidade: <b><span id="Cidade"></span></b></h6>
		<svg id="mapaSvg" id="mapaSvg" viewBox="<?php echo $viewBox['svg']; ?>">
			<?php 
			while($row = pg_fetch_array($GeomCidades)){
				echo "<path  id='".$row['nome']."' d='".$row['svg']."' stroke='black' stroke-width='0.005' fill='red' fill-opacity='' onmouseover='exibirNome(evt)' onmouseout='removerNome()'/>";
			}
			?>
		</svg>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat" >Fechar</a>
		</div>
	</div>
	<div id="SOBRE" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4><a href="https://github.com/Leanderson-Coelho/Make_RPG_Stories" target="_blank">Make RPG Stories</a></h4>
			<h5>Sobre o projeto</h5>
			<div class="row">
				<hr>
				<div class="col s12 l8">
					<h6>Mais do projeto:</h6>
					<p style="text-align: justify;">Aplicativo que auxilia na criação de histórias RPG. Desde história simples até as mais complexas poderão ser criadas e organizadas em cards. Além de possibilitar a visualização do desenrolar da história através da exibição de um grafo semelhante a uma arvore de decisões.</p>
				</div>
				<div class="col s12 l4">
					<h6>Desenvolvedores:</h6>
					<p><a class="desenvolvedores" href="https://github.com/Ian-Carneiro" target="_blank">Ian Carneiro</a></p>
					<p><a class="desenvolvedores" href="https://github.com/Leanderson-Coelho" target="_blank">Leanderson Coelho</a></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col s12 l4">
					<h7>Parceiros:</h7>
					<p><a href="https://github.com/camilacarwalho" target="_blank">Camila Carwalho</a></p>
					<p><a href="https://github.com/MailsonD" target="_blank">Mailson Dennis</a></p>
				</div>
				<div class="col s12 l4">
					<h7>Imagens:</h7>
					<p><a href="https://felipeirnyo.artstation.com/" target="_blank">Felipe Irnyo</a></p>
				</div>
				<div class="col s12 l4">
					<h7>Frameworks / Bibliotecas:</h7>
					<p><a href="http://js.cytoscape.org/" target="_blank">Cytoscape</a></p>
					<p><a href="https://materializecss.com/" target="_blank">Materializecss</a></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col s12 l4">
					<h7>Projeto Relacionado:</h7>
					<p><a href="https://github.com/MailsonD/Banco2_RpgManager" target="_blank">Rpg Manager</a></p>
				</div>
				<div class="col s12 l4">
					<h7>Bancos Utilizados:</h7>
					<p id="firebase" class="bds"><b>FireBase</b></p>
					<p id="mongoDB" class="bds"><b>MongoDB</b></p>
					<p id="postgres" class="bds"><b>Postgres</b></p>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
		</div>
	</div>
</body>
</html>
