<!DOCTYPE html>
<html>
<head>
	<title>Farmácia On-line</title>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();
if((!isset ($_SESSION['id']) == true))
{
  echo"<script> alert('Você precisa estar logado para acessar essa página!');window.location
        .href='entrar.php';</script>";
}else{

include "../bd/conexao.php";

$id = $_GET['id'];


$sql = "DELETE FROM usuarios WHERE id = $id AND id != 0";

$result = mysqli_query($connect, $sql);

if ($result) {
	echo "<script> alert('Conta deletada com sucesso!'); window.location.href='entrar.php'; </script>";
}

}

?>
</body>
</html>