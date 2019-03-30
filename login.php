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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<!-- CSS DEFAULT -->
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<!-- CUSTOM -->
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!-- INICIALIZAÇÃO JQUERY DOS COMPONENTES MATERIALIZE -->
	
	<script src="js/initialization.js"></script>
</head>
<body>
	<div class="row">
		<div class="col s10 m8 l5 divLogin">
			<div class="card cardLogin z-depth-5">
				<a><i id="iconeLogin" class="material-icons large">face</i></a>
				<h4 id="frase">Entre e crie seu próprio mundo.</h4>
				<form>
					<div class="input-field inputLogin">
						<i class="material-icons prefix">perm_identity</i>
						<input type="text" name="login" id="login" placeholder="Email" />
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
			<div class="row">
				<div class="">
					<b><a id="criarConta" href="#">Criar uma conta</a></b>
				</div>
			</div>
		</div>
		<!-- <div class="row">
			<div class="col l2 push-l5">
				
			</div>
		</div> -->
	</div>
</body>
</html>