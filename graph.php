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
					'content': 'data(titulo)',
					'text-opacity': 0.5,
					'text-valign': 'center',
					'text-halign': 'right',
					'background-color': '#007399',
					'width': 10,
					'height': 10
				}
			},
			{
				selector: 'edge',
				style: {
					'curve-style': 'bezier',
					'width': 0.9,
					'target-arrow-shape': 'vee',
					'line-color': '#696969',
					'target-arrow-color': '#696969',
				}
			}
			],
			<?php include("dao/nodesRelationships.php") ?>	
		});
		cy.maxZoom(2);
		cy.minZoom(0.5);

		// CORES PADRAO
		var COR_PADRAO = "#007399";
		var COR_FROM = "#B8860B";
		var COR_FOR = "#990000";
		var COR_NOVO_NODO = "#990000";


		// CONTROLE DA DIV DE OPÇOES DE MESCLAGEM
		// ATIVA OU DESATIVA AS CORES POR SELEÇÃO
		var buttonDivMesclagem = false;
		// CONTROLE DE MERGE CORES
		// lastFor: Ultimo nodo que foi selecionado para ser o nodo que recebe a relação
		var lastFor = "";
		// firstFor: Primeiro nodo selecionado para ser o nodo de onde sai a relação
			// A variavel serve para controle de seleção, caso o usuário tente 
			// selecionar o primeiro nodo novamente. 
		var firstFrom = "";
		// CONTROLE DE MERGE
		// A variavel serve para fazer o controle de seleção, caso o usuário tente selecionar
		// outro nodo para ser o correspondido de uma nova relação, o nodo selecionado anteriormente
		// terá cor padrão.
		var ultimoNo = "";




		// CONTROLE DA DIV DE OPÇOES DE MESCLAGEM
		// ATIVA OU DESATIVA AS CORES POR SELEÇÃO
		$("#trigger-merge").click(function(){
			if(buttonDivMesclagem==false){
				$("#Node").prop("disabled", true);
				$("#mesclar").prop("disabled", true);
				buttonDivMesclagem = true;
				limpar(false);
				ultimoNo.css("background-color", COR_PADRAO);
			}else{
				buttonDivMesclagem = false;
				limpar(true);
			}
		})

		$("#Node").ready(function(){
			if(<?php include("dao/contarNodos.php");?>==0){
				$("#Node").prop("disabled", false);
			}else{
				$("#trigger-merge").prop("disabled", false);
			}
		});
		
		cy.on('click', 'node', function(evt){
			if(buttonDivMesclagem){
				if($("#from").val()==""){
					this.css("background-color", COR_FROM);
					lastFor = this;
					firstFrom = this;
				}else if($("#for").val()!=""){
					if(this.id()==firstFrom.id()){
						return;
					}else if(this.id()==lastFor.id()){
						return;
					}
					else{
						this.css("background-color", COR_FOR);
						lastFor.css("background-color", COR_PADRAO);
						lastFor = this;
					}
				}else if (this.id()==firstFrom.id()){
					return;
				}else{
					$("#mesclar").prop("disabled", false);
					this.css("background-color", COR_FOR);
					lastFor = this;
				}	
			}
			
		})

		// LIMPAR CORES E VALORES DO FORMULARIO DE MERGE
		$("#limpar").click(function(){
			limpar(true);
		})

		// LIMPA OS CAMPOS E CORES DOS NODOS
		// PARAMETROS: $limparCores
					// Se true atribui as cores padrões aos nodos
					// Caso seja false limpa apenas os campos dos input's
		function limpar(limparCores){
			$("#mesclar").prop("disabled", true);
			$("#from").val("");
			$("#for").val("");
			$("#fromUsuario").val("");
			$("#forUsuario").val("");
			if(limparCores==true){
				if(lastFor!="")
					lastFor.css("background-color", COR_PADRAO);
				if(firstFrom!="")
					firstFrom.css("background-color", COR_PADRAO);
			}
		}
		//CONTROLE DE MERGE
		var ultimoNo = "";
		cy.on('click', 'node', function(evt){
			// <START> seleciona o valor do predecessor caso o usuário crie um novo nodo
			$("#predecessor").val(this.id());
			$("#cardTitulo").text(this.data('titulo'));

			$.ajax({
				type: 'POST',
				url: 'dao/buscarDadosNodos.php',
				cache: false,
				data: { 'id': this.id() },
				success : function(retorno){
					$("#cardConteudo").text(retorno);
				}
			});
			// VERIFICAÇÃO DE COR DO NODO
			if(!buttonDivMesclagem){
				$("#Node").prop("disabled", false);/////////////////////////
				if(ultimoNo=="")
					ultimoNo = this;
				if(ultimoNo.id()!=this.id())
					ultimoNo.css("background-color", COR_PADRAO);
				this.css("background-color", COR_NOVO_NODO);
				ultimoNo = this;
			}
			// <END>
			if($("#from").val()==""){
				// campo que é enviado pro cadastro
				$("#from").val(this.id());
				// campo que é apenas exibido pro usuário
				$("#fromUsuario").val(this.data('titulo'));

			}else{
				if(this.id()!=$("#from").val()){
					// campo que é enviado pro cadastro
					$("#for").val(this.id());
					// campo que é apenas exibido pro usuário
					$("#forUsuario").val(this.data('titulo'));
				}

			}
		})

	});
</script>
<?php include("dao/nodesRelationships.php") ?>