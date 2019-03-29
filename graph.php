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
			<?php include("dao/nodesRelationships.php") ?>	
		});


		cy.zoomingEnabled(false);

		// CORES PADRAO
		var COR_PADRAO = "blue";
		var COR_FROM = "yellow";
		var COR_FOR = "green";
		var COR_NOVO_NODO = "green";


		// CONTROLE DA DIV DE OPÇOES DE MESCLAGEM
		// ATIVA OU DESATIVA AS CORES POR SELEÇÃO
		var buttonDivMesclagem = false;
		$("#trigger-merge").click(function(){
			if(buttonDivMesclagem==false){
				buttonDivMesclagem = true;
				limpar(false);
				ultimoNo.css("background-color", COR_PADRAO);
			}else{
				buttonDivMesclagem = false;
				limpar(true);
			}
			console.log(buttonDivMesclagem);
		})

		// CONTROLE DE MERGE CORES
		var lastFor = "";
		var firstFrom = "";
		cy.on('click', 'node', function(evt){
			if(buttonDivMesclagem){
				if($("#from").val()==""){
					this.css("background-color", COR_FROM);
					lastFor = this;
					firstFrom = this;
				}else if($("#for").val()!=""){
					if(this.id()==firstFrom.id()){
						return;
					}else{
						this.css("background-color", COR_FOR);
						lastFor.css("background-color", COR_PADRAO);
						lastFor = this;
					}
				}else{
					this.css("background-color", COR_FOR);
					lastFor = this;
				}	
			}
			
		})
		// CORES:

		// LIMPAR CORES E VALORES DO FORMULARIO DE MERGE
		$("#limpar").click(function(){
			limpar(true);
		})

		// LIMPA OS CAMPOS E CORES DOS NODOS
		// PARAMETROS: $limparCores
					// Se true atribui as cores padrões aos nodos
					// Caso seja false limpa apenas os campos dos input's
		// COR PADRÃO:
		
		function limpar(limparCores){
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
			// VERIFICAÇÃO DE COR DO NODO
			
			if(!buttonDivMesclagem){
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
				$("#Node").prop("disabled", false);
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