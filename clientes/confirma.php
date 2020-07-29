<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</head>
<body>
	<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Produto não encontrado</h4>
      <p>Desculpe, mas este produto não está no estoque!</p>
    </div>
    <div class="modal-footer">
      <a href="farmacia.php" class="modal-close waves-effect waves-green btn-flat red"> <div style="color: white">Ok</div></a>
    </div>
  </div>
<?php

require "../bd/conexao.php";
$nome = $_POST['search'];

$sql = "SELECT id FROM produto WHERE nome = '$nome'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){  
while($resultado = mysqli_fetch_array($result)){
$resultadoFinal = $resultado['id'];
header("Location: addprodutos.php?id= $resultadoFinal");
}
}else{
?>

<script type="text/javascript">
	$(document).ready(function(){
    $('.modal').modal();
    $('.modal').modal('open');
  });
</script>
<?php
}
?>
</body>
</html>