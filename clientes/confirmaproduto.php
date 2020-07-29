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
<?php
session_start();
include "../bd/conexao.php";
$logado = $_SESSION['email'];
$id = $_POST['id'];
$quant = $_POST['quantidade'];
$sql = "SELECT * FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while($dados = mysqli_fetch_array($resultado)){
        $nome = $dados['nome'];
		$preco = $dados['valor'];
        }
    }
$valorTotal = $quant * $preco;

$sql2 = "SELECT quantidade FROM produto WHERE id = '$id'";
$resultado2 = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado2) > 0){ 
        while($dados2 = mysqli_fetch_array($resultado2)){
          $quantidadeProduto = $dados2['quantidade'];
        }
    }

$quantidadeFinal = $quantidadeProduto - $quant;

$sql3 = "UPDATE produto SET quantidade='$quantidadeFinal' WHERE id = '$id'";

mysqli_query($connect,$sql3);


$sql1 = "INSERT INTO carrinho (`nome`, preco, quantidade, valor, `email`) VALUES ('$nome', $preco, $quant, $valorTotal, '$logado')";

$resultado1 = mysqli_query($connect, $sql1);

if ($resultado1) {
?>
<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Adicionar produto ao carrinho</h4>
      <p>Produto adicionado com sucesso!</p>
    </div>
    <div class="modal-footer" style="color: white">
      	<a href="carrinho.php" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </div>
  </div>
<?php
}else{
?>
<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Adicionar produto ao carrinho</h4>
      <p>Erro ao adicionar produto!</p>
    </div>
    <div class="modal-footer" style="color: white">
      	<a href="farmacia.php" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </div>
  </div>
<?php
} 
?>

<script type="text/javascript">
	$(document).ready(function(){
	$('.modal').modal();
    $('.modal').modal('open');
  });
</script>
</body>
</html>

