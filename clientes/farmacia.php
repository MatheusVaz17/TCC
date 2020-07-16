<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="../owl.carousel.min.js"></script>
<link rel="stylesheet" href="../owl.carousel.min.css">
<link rel="stylesheet" href="../owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../estilo_botoes/estilo.css">
</head>
<body>
<?php
$login = $_COOKIE['login'];
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado para acessar essa página!');window.location
        .href='entrar.php';</script>";
  }
if (isset($login)) {
include "../bd/conexao.php";
$logado = $_SESSION['email'];


$sql = "SELECT * FROM carrinho WHERE email = '$logado'";
$resultado = mysqli_query($connect, $sql);

$sql = "SELECT * FROM usuarios WHERE email = '$logado'";
$foto = mysqli_query($connect, $sql);
if(mysqli_num_rows($foto) > 0){ 
while ($dados = mysqli_fetch_array($foto)) { 

$resultFoto = $dados['foto'];

?>


<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a  class="brand-logo"><img src="../logo.png" align="center"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a></li>
      </ul>
    </div>
  </div>
  </nav>
</div>


<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img style="width: 100%" src="background.jpg">
      </div>
      <a><img class="circle" src="../fotos/clientes/<?php echo $dados['foto'] ?>"></a>
      <a><span class="black-text name"><b>Bem vindo(a) <?php echo $login; ?></b></span></a>
      <a><span class="black-text email"><b><?php echo $logado; ?></span></b></a>
    </div></li>
    <li><a href="carrinho.php">Carrinho: <?php echo mysqli_num_rows($resultado); ?> <i class="material-icons left">shopping_cart</i></a></li>
    <li><a href="#">Suas informações <i class="material-icons left">person_pin</i></a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Sessão</a></li>
    <li><a href="../sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
  </ul>

<?php
} 
}
?>

<!-- Slider -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="../img1.png"> <!-- random image -->
        <div class="caption center-align">
        </div>
      </li>
      <li>
        <img src="../img2.jpg"> <!-- random image -->
        <div class="caption left-align">
        </div>
      </li>
      <li>
        <img src="../img3.jpg"> <!-- random image -->
        <div class="caption right-align">
        </div>
      </li>
      <li>
        <img src="../img4.jpg"> <!-- random image -->
        <div class="caption center-align">
        </div>
      </li>
    </ul>
  </div>

<!--Products-->
<div class="container">
  <h4>Medicamentos:</h4>
  <div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel1">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql = "SELECT * FROM produto WHERE tipo = 'Medicamento' AND disponibilidade ='Disponivel'";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable">
            <span class="card-title"><?php echo $dados['nome']; ?></span>
            <p><img width="50" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="align-self: flex-end" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-3"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
          </div>
          </div>
          </div>
        </div>
        <?php
        }
        }else{
        ?>
        <div class="owl-item">
            <p>Não há medicamentos registrados!</p>
        </div>
        <?php
        }
        ?>
</div>
</div>
</div>
</div>
</div>

<?php
if (mysqli_num_rows($resultado) > 5) {
?>
<div class="navegacao">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="anterior"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proximo"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>


<br>
<div class="container">
<h4>Higiene: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel2">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE tipo = 'Higiene' AND disponibilidade ='Disponivel'";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable">
            <span class="card-title"><?php echo $dados['nome']; ?></span>
            <p><img width="50" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="align-self: flex-end" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-3"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
          </div>
          </div>
          </div>
        </div>

        <?php
        }
      }else{
        ?>
        <div class="owl-item">
            <p>Não há Produtos de Higiene cadastrados!</p>
        </div>
        <?php
        }
        ?>

        </div>
        </div>
        </div>
      </div>
    </div>

<?php
if (mysqli_num_rows($resultado1) > 5) {
?>
<div class="navegacao1">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="ant"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="prox"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>

<style>

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
<!-- Jquery's and JS-->
<script>
function nav(){
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
}


$(document).ready(function(){
    $('.slider').slider({indicators: false});
    $('.sidenav').sidenav();


    var owl1 = $("#carousel1");
    owl1.owlCarousel({
		items: 5
	});

    $('#anterior').on('click', function(){
      owl1.trigger('prev.owl.carousel');
    })

    $('#proximo').on('click', function(){
      owl1.trigger('next.owl.carousel');
    })
	
	var owl2 = $("#carousel2");

    owl2.owlCarousel({
		items: 5
	});

    $('#ant').on('click', function(){
      owl2.trigger('prev.owl.carousel');
    })

    $('#prox').on('click', function(){
      owl2.trigger('next.owl.carousel');
    })



});

     
</script>


</body>
</html>
<?php

if ($_SESSION['check'] == false) {
  session_destroy();
}
}else{
  echo " <javascript> alert('Usuário não cadastrado'); window.location.href='login.php' </javascript> ";
}

