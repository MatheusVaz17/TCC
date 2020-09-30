<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
	<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
	<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>

<div id="modal1" class="modal">
    
    <div class="modal-content">
      <h4>Excluir produto</h4>
      <p>Você não selecionou nenhum produto para ser excluido!</p>
    </div>
    <div class="modal-footer">
      <a href="carrinho.php" class="modal-close waves-effect waves-green btn-flat red white-text">ok</a> 
    </div>
    
  </div>

<?php

require "../bd/conexao.php";

if (empty($_POST['deletar'])) {
?>

<script type="text/javascript">
	$(document).ready(function(){
    $('.modal').modal();
    $('.modal').modal('open');
  });
</script>

<?php
die;
}

foreach ($_POST['deletar'] as $checkbox) {
$sql1 = "SELECT quantidade, nome FROM carrinho WHERE id = '$checkbox'";
$resultado = mysqli_query($connect, $sql1);
while($dados = mysqli_fetch_array($resultado)){ 

$quantidade = $dados['quantidade'];
$nome = $dados['nome'];

}



$sql2 = "SELECT quantidade FROM produto WHERE nome = '$nome'";
$resultado2 = mysqli_query($connect, $sql2);
while($dados2 = mysqli_fetch_array($resultado2)){

$quantidade2 = $dados2['quantidade'];

}

$quantidadeTotal = $quantidade + $quantidade2;

$sql3 = "UPDATE produto SET quantidade = $quantidadeTotal WHERE nome = '$nome'";
$resultado3 = mysqli_query($connect, $sql3);

$sql4 = "DELETE FROM carrinho WHERE id = '$checkbox'";
$resultado4 = mysqli_query($connect, $sql4);


}

include("exibicao.php");

?>
</body>
</html>