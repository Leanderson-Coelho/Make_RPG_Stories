<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Entre e Cria as maiores histórias de aventura</title>
	<!-- JQUERY -->
	<script src="js/JQuery.js"></script>
	<!-- MATERIALIZE CSS-->
	<link rel="stylesheet" href="css/materialize.css">
	<!-- MATERIALIZE JS -->
	<script src="js/materialize.js"></script>
	<!-- ICONS MATERIALIZA -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- CSS DEFAULT -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<!-- CUSTOM -->
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!-- INICIALIZAÇÃO JQUERY DOS COMPONENTES MATERIALIZE -->
	<!-- LOGIN JS-->
	<script src="js/initialization.js"></script>
</head>
<body>
	<div class="row">
		<div class="col s10 m8 l5 divLogin">
			<div class="card cardLogin z-depth-5">
				<a><i id="iconeLogin" class="material-icons large">face</i></a>
				<h4 id="frase">Entre e crie seu próprio mundo.</h4>
				<form method="POST" action="controllers/controleSessao.php">
					<div class="input-field inputLogin">
						<i class="material-icons prefix">perm_identity</i>
						<input type="email" name="login" id="login" placeholder="Email" />
					</div>
					<div class="input-field inputLogin">
						<i class="material-icons prefix">lock_outline</i>
						<input type="password" name="senha" id="senha" placeholder="senha" />
					</div>
					<div class="input-field">
						<button class="btn waves-effect waves-light right" type="submit"><i class="material-icons right tiny">send</i>ENTRAR</button>
					</div>
				</form>
			</div>
			<div class="red center"><h5><?php echo $_GET['msgErro']; ?></h5></div>
			<div class="row">
				<div class="">
					<b><a id="criarConta" href="#CADASTRO" class="waves-effect waves-light modal-trigger">Criar uma conta</a></b>
				</div>
			</div>
		</div>
	</div>
	<!-- MODALS -->
	<div id="CADASTRO" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Crie sua conta já!</h4>
			<p>Make RPG stories</p>
			<div class="row">
				<div class="col l12">
					<form action="controllers/cadastroUsuario.php" method="POST">
						<div class="row">
							<div class="col l3"><label for="cEmail" class="labelCadastro">Email:</label></div>
							<div class="col l9">
								<div class="input-field input-field-cadastro">
									<input id="cEmail" class="inputsCadastro" type="email" name="email" required>
								</div>
							</div>
							<div class="col l3"><label for="cSenha" class="labelCadastro">Senha:</label></div>
							<div class="col l9">
								<div class="input-field input-field-cadastro">
									<input id="cSenha" class="inputsCadastro" type="password" name="senha" minlength="8" required>
								</div>
							</div>
							<div class="col l3"><label for="cConfirmarSenha" class="labelCadastro">Confirmar Senha:</label></div>
							<div class="col l9">
								<div class="input-field input-field-cadastro">
									<input id="cConfirmarSenha" class="inputsCadastro" type="password" minlength="8" name="confirmarSenha" required><span>Digite a senha novamente para efetuar o cadastro.</span>
								</div>
							</div>
							<div class="col l3"><label for="cNomeUsuario" class="labelCadastro">Nome de usuário:</label></div>
							<div class="col l9">
								<div class="input-field input-field-cadastro">
									<input id="cNomeUsuario" class="inputsCadastro" type="text" name="nomeUsuario" minlength="8" required>
								</div>
							</div>
							<div class="input-field">
								<button class="btn waves-effect waves-light right" type="submit" >Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
		</div>
	</div>
	<!--  -->
</body>
</html>