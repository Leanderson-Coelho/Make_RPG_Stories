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
                // CARREGA OS NODOS DO BANCO
                <?php 
                  include("js/data.php"); 
                ?>
                
                ],
                edges: [

                ]
            },
        });
            cy.zoomingEnabled(false);
        });
    </script>