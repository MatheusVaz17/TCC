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
$check = $_POST['check'];

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

if (isset($_POST['sub'])) {
	$verifica = mysqli_query($connect, $sql);
    if (mysqli_num_rows($verifica)>0){
        $array = mysqli_fetch_array($verifica);

            $nome = $array['nome'];
            $id = $array['id'];
            setcookie('login',$nome);
            $_SESSION['id'] = $id;
            $_SESSION['check'] = $check;

            if ($array['email'] == 'farmacia@farmacia.com' and $array['senha'] == 'administrador00') {
                header("Location: ../adm/adm.php");
            }else{ 
            header("Location: farmacia.php");
            }
        
      }else{
        unset ($_SESSION['id']);
        unset ($_SESSION['cpf']);
        unset ($_SESSION['check']);
      	echo"<script> alert('Email e/ou senha incorretos');window.location
        .href='entrar.php';</script>";
        die();
      }
}

?>
</body>
</html>