<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
</head>
<body>
<?php
require "../bd/conexao.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

if (isset($_POST['sub'])) {
	$verifica = mysqli_query($connect, $sql);
    if (mysqli_num_rows($verifica)>0){
        $array = mysqli_fetch_array($verifica);
        $nome = $array['nome'];
        setcookie('login',$nome);
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header("Location: farmacia.php");
      }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['cpf']);
      	echo"<script> alert('Email e/ou senha incorretos');window.location
        .href='entrar.php';</script>";
        die();
      }
}

?>
</body>
</html>