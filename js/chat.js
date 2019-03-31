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
		"id":counter,
		"usuario":usuario,
		"msg":msgText
	};
	let db = firebase.database().ref('mensagens/'+counter);
	db.set(msg);
	document.getElementById('msgRecebidas').innerHTML = "";
	visualizarMsgs();
}

function visualizarMsgs(){
	var db = firebase.database().ref('mensagens/');
	db.on('child_added', function(dado){
		var msgs = dado.val();
		document.getElementById('msgRecebidas').innerHTML += `<p><b>${msgs.usuario}</b> : ${msgs.msg}</p>`;
	})
}