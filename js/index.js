  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyB3oK0weax67oDE_fqNWrDF_vKz-xlkwxA",
    authDomain: "banco-para-projeto-de-banco.firebaseapp.com",
    databaseURL: "https://banco-para-projeto-de-banco.firebaseio.com",
    projectId: "banco-para-projeto-de-banco",
    storageBucket: "banco-para-projeto-de-banco.appspot.com",
    messagingSenderId: "47253401604"
  };
  firebase.initializeApp(config);

  var d = new Date();
  var t = d.getTime();
  var counter = t;