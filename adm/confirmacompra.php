<?php

session_start();
if((!isset ($_SESSION['email']) == 'farmacia@farmacia.com') and (!isset ($_SESSION['senha']) == 'administrador00'))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }

include "../bd/conexao.php";

$id = $_GET['id'];

$sql = "UPDATE pagamentos SET pedido='Encaminhado' WHERE id='$id'";
if (mysqli_query($connect, $sql)) {
	header("Location: compras.php");
}else{
	echo "Erro: ".mysqli_error();
}