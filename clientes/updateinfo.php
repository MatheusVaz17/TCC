<?php
session_start();
if((!isset ($_SESSION['id']) == true))
{
  unset($_SESSION['id']);
  unset($_SESSION['senha']);
  echo"<script> alert('Você precisa estar logado para acessar essa página!');window.location
        .href='entrar.php';</script>";
}else {
include "../bd/conexao.php";

$idUsusario = $_SESSION['id'];
$id = $_POST['id'];
$fototext = $_POST['fototext'];
$cep = $_POST['cep'];
$celular = $_POST['celular'];
$endereco = $_POST['endereco'];
$numcasa = $_POST['numcasa'];

if ($fototext == 'empty' or empty($fototext)) {
	$novo_nome = 'empty';
}else{
  $extensao = strtolower(substr($_FILES['foto']['name'], -4));
  if ($extensao) {
  $novo_nome = md5(time()).".".$extensao;
  $diretorio = "../fotos/clientes/";
  move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
  }else{
  $novo_nome = "empty";
  }
}

$sql = "UPDATE usuarios SET celular='$celular', cep='$cep', foto='$novo_nome', numcasa='$numcasa', endereco='$endereco' WHERE id = '$idUsusario' ";

if (mysqli_query($connect, $sql)) {
	header("Location: farmacia.php");
}

}
?>