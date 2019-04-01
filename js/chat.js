var config = {
	apiKey: "AIzaSyAjJCx3FShx6Kek9ZFrWWZOYMiLgwGvVns",
	authDomain: "banco-para-o-prjeto-de-banco.firebaseapp.com",
	databaseURL: "https://banco-para-o-prjeto-de-banco.firebaseio.com",
	projectId: "banco-para-o-prjeto-de-banco",
	storageBucket: "banco-para-o-prjeto-de-banco.appspot.com",
	messagingSenderId: "690364251924"
};
firebase.initializeApp(config);
var d = new Date();
var t = d.getTime();
counter = t;

document.getElementById("form").addEventListener("submit", (e)=>{
	var msg = msgChat.value;
	var user = usuario.value;
	e.preventDefault();
	criarMsg(msg, user);
	form.reset();
});


function criarMsg(msgText, usuario){
	counter+=1;
	var msg={
		"usuario":usuario,
		"msg":msgText,
		"mestre": true
	};
	let db = firebase.database().ref('mensagens/').push();
	db.set(msg);
	// document.getElementById('msgRecebidas').innerHTML = "";
}

firebase.database().ref().child('mensagens/').on('child_added', function(dado){
	var msgs = dado.val();
	if(true){
		document.getElementById('msgRecebidas').innerHTML += `<div class="col s12"><h6><b>${msgs.usuario}</b> : ${msgs.msg}</h6></div>`;
	}else{
		document.getElementById('msgRecebidas').innerHTML += `<div class="col s12"><h6 class="right-align"><b>${msgs.usuario}</b> : ${msgs.msg}</h6></div>`;
	}
	



	$('#msgRecebidas').scrollTop($('#msgRecebidas')[0].scrollHeight);
})