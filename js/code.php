<?php
include("data.php");

echo "foi"
$conteudo = '';
foreach($cursor as $document){
  $nodo = $document['data'];
  $conteudo += "{ data: 
    { id: ".$nodo['id']."}
        },";
}

echo $conteudo;
      // {
      //   data: { id: 'a' }
      // }
?>

