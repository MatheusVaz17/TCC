<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
</head>
<body>
<?php
require "../bd/conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

if (isset($_POST['sub'])) {
	$verifica = mysqli_query($connect, $sql);
    if (mysqli_num_rows($verifica)<=0){
        echo"<script> alert('Email e/ou senha incorretos');window.location
        .href='entrar.php';</script>";
        die();
      }else{
      	$array = mysqli_fetch_array($verifica);
    	$nome = $array['nome'];
        setcookie('login',$nome);
        header("Location: farmacia.php");
      }
}

?>
</body>
</html>