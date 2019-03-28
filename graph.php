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

		cy.on('click', 'node', function(evt){
			$("#predecessor").val(this.id());
			console.log(this);
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