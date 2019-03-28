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
			// {
			// 	selector:'node:selected',
			// 	style:{
			// 		'background-color': 'black',
			// 		'line-color': 'black',
			// 		'target-arrow-color': 'black',
			// 		'source-arrow-color': 'black',
			// 		'opacity': 1
			// 	}
			// },
			// {
			// 	selector:'.faded',
			// 	style:{
			// 		'opacity': 0.25,
			// 		'text-opacity': 0
			// 	},
			// },
			],
			<?php include("dao/nodesRelationships.php") ?>	
		});
		cy.maxZoom(2);
		cy.minZoom(0.5);
		cy.viewport({
			zoom: 0.8,

		});
		// cy.$('node:selected').neighborhood('edge').style( { 'line-color' : 'black' }); 
		// cy.$('node:selected').connectedEdges().style( { 'line-color' : 'black' });
		// cy.$('node').on('grab', function (e) {
		// 	var ele = e.target;
		// 	ele.neighborhood('edge').style( { 'line-color' : 'black' }); 
		// });

		/*cy.$('node').on('free', function (e) {
			var ele = e.target;
			ele.connectedEdges().style({ 'line-color': '#FAFAFA' });
		});*/
		cy.on('click', 'node', function(evt){
			$("#predecessor").val($(this.id()).val());
			$("#cardTitulo").val()
			if($("#from").val()==""){
				$("#from").val(this.id());
				$("#Node").prop("disabled", false);

			}else{
				if(this.id()!=$("#from").val())
					$("#for").val(this.id());
			}
		})
	});
</script>