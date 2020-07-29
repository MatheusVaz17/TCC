<?php

require "../bd/conexao.php";
$nome = $_POST['search'];

$sql = "SELECT id FROM produto WHERE nome = '$nome'";
$result = mysqli_query($connect, $sql);
while($resultado = mysqli_fetch_array($result)){
$resultadoFinal = $resultado['id'];
}
header("Location: addprodutos.php?id= $resultadoFinal");
?>