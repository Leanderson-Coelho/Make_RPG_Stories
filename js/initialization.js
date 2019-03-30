// INICIALIZA SELECT
$(document).ready(function(){
	$('select').formSelect();
});

// INICIALIZA INPUTS
$(document).ready(function() {
	$('input#input_text, textarea#textarea2').characterCounter();
});

// INICIA COLLAPSIBLE
$(document).ready(function(){
	$('.collapsible').collapsible();
});

// SIDE NAV
$(document).ready(function(){
	$('.sidenav').sidenav();
});

// BUTÃO FLUTUANTE
$(document).ready(function(){
	$('.fixed-action-btn').floatingActionButton();
});

// MODALS
$(document).ready(function(){
	$('.modal').modal();
});