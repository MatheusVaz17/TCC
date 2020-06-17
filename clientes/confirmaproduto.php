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
$cpf = $_SESSION['cpf'];

$sql1 = "INSERT INTO carrinho (`nome`, preco, quantidade, valor, `email`) VALUES ('$nome', $preco, $quant, $valorTotal, '$logado')";

$resultado1 = mysqli_query($connect, $sql1);

if ($resultado1) {
	echo"<script> alert('Produto adicionado com sucesso ao carrinho'); window.location.href='carrinho.php';</script>";
}else{
	echo"<script> alert('Erro ao adicionar produto ao carrinho'); window.location.href='farmacia.php';</script>";
}

?>