<?php

require "../bd/conexao.php";

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