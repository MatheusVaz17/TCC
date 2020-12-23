<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="icon.jpg">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="../owl.carousel.min.js"></script>
<link rel="stylesheet" href="../owl.carousel.min.css">
<link rel="stylesheet" href="../owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../estilo_botoes/estilo.css">
<link rel="icon" href="../fav.png" />
<script type="text/javascript" src="search.js"></script>
</head>
<body>
<?php

session_start();
if((!isset ($_SESSION['id']) == '1') or (!isset ($_SESSION['id'])))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }

include "../bd/conexao.php";
if (isset($_GET['email'])){
  $email = $_GET['email'];
}else{
   echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
}

?>
<!-- Navbar -->

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a href="#!" class="brand-logo"><img src="../logo.png" align="center"></a>
      </div>
      <ul class="right hide-on-med-and-down">
        <li><a href="compras.php">Voltar</a></li>
      </ul>
    </div>
  </nav>
  </div>

<?php
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($connect, $sql);

$dados = mysqli_fetch_array($resultado);
?>

<div class="row">
    <div class="col s12 m10 push-m1">
      <div class="card #e3f2fd blue lighten-5" style="height: 650px">

         <div class="col s12 m6">
           <?php
           if ($dados['foto'] != 'empty') {
              ?>
              <p>
                <img width="400" style="border: 2px solid black" height="360" src="../fotos/clientes/<?php echo $dados['foto']; ?>">
              </p>
              <?php
            } else{
            ?>
            <p>
               <img width="400" style="border: 2px solid black" height="360" src="../defaultpic.jpg">
             </p>
            <?php
            }
           ?>

          <p>
            <h5>Nome:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['nome']." ".$dados['sobrenome']; ?></div>
          </p>
          <p>
            <h5>Sexo:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['sexo']; ?></div>
          </p>
         </div>

          <div class="col s12 m6">
            <p>
            <h5>Email:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['email']; ?></div>
          </p>
          <p>
            <h5>CPF:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['cpf']; ?></div>
          </p>
          <p>
            <h5>Celular:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['celular']; ?></div>
          </p>
          <p>
            <h5>Data de Nascimento:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo $dados['dataNascimento']; ?></div>
          </p>
          <p>
            <h5>Endereço:</h5>
            <div style="width: 400px; padding: 17px; background-color: white; border: 2px dashed black"><?php echo "CEP: ".$dados['cep']."<br> Número da casa: ".$dados['numcasa']."<br> Bairro: ".$dados['endereco']; ?></div>
          </p>
          </div>

        </div>
      </div>
    </div>

<style type="text/css">
  .container {
  
margin: 0 auto;
  
max-width: 1280px;
  
width: 95%;

}

@media only screen and (min-width: 601px) {
 
.container {
    
width: 95%;
  
}

}

@media only screen and (min-width: 993px) {
  
.container {
    
width: 95%;
  
}
}
</style>
</body>
</html>