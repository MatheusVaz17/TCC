<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
</head>
<body>
<?php
require "../bd/conexao.php";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];
$cep = $_POST['cep'];
$dataNasc = $_POST['data'];

$query_select = "SELECT email,cpf FROM usuarios WHERE email = '$email' or cpf = '$cpf'";
$select = mysqli_query($connect, $query_select);
$dados = mysqli_fetch_array($select);
if($dados['email'] == $email or $dados['cpf'] == $cpf){
 
        echo"<script> alert('Esse email ou cpf já existe'); window.location.href='cadastro.php'</script>";
        die;
    }else{
        $query = "INSERT INTO usuarios (nome,sobrenome,email,cpf,celular,senha,sexo,cep,dataNascimento) VALUES ('$nome','$sobrenome','$email','$cpf','$celular','$senha','$sexo','$cep','$dataNasc')";
        $insert = mysqli_query($connect,$query);

    if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='entrar.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.php'</script>";
        }
    }
?>
</body>
</html>