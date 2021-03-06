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
if((!isset ($_SESSION['id']) == true) or $_SESSION['id'] != 1)
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }

include "../bd/conexao.php";


?>
<!-- Navbar -->
<form method="POST" action=''>
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a href="#!" class="brand-logo"><img src="../logo.png" align="center"></a>
      </div>
      <ul class="right hide-on-med-and-down">
         <li>
                   <div class="center row">
                      <div class="col s12 " >
                        <div class="row" id="topbarsearch">
                          <div class="input-field col s6 s12 white-text">
                            
                            <input type="text" placeholder="Pesquisar" id="pesquisa" name="search" class="autocomplete white-text" size="50" >
                            <ul class="resultado" style="background-color: white; color: black;">
            
                            </ul>
                          
                            </div>
                          </div>
                        </div>
                      </div>         
                  </li>
        <li><a href="compras.php"><i class="material-icons left">shopping_basket
</i>Compras</a></li>
        <li><a href="registrar.php"><i class="material-icons left">add</i>Adicionar produto</a></li>
        <li><a href="../sair.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
      </ul>
      </div>
    </div>
  </form>
  </nav>

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
$sql = "SELECT * FROM produto WHERE idtipo = 1";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card medium hoverable z-depth-3">
            <span class="card-title" style="font-size: 16px; font-weight: bold;"><blockquote><?php echo $dados['nome']; ?></blockquote></span>
            <div class="card-image">
            <img class="responsive-img" src="../fotos/<?php echo $dados['foto'] ?>">
            </div>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p align="center"><a style="align-self: flex-end" href="../produtos/delete.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #d32f2f red darken-2"><i class="material-icons left">delete</i></a> <a style="align-self: flex-end" href="../produtos/editar.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #1e88e5 blue darken-1 "><i class="material-icons left">create</i></a></p>
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
$sql1 = "SELECT * FROM produto WHERE idtipo = 2";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m10">
          <div class="card medium hoverable z-depth-3">
            <span class="card-title" style="font-size: 16px; font-weight: bold;"><blockquote><?php echo $dados['nome']; ?></blockquote></span>
            <div class="card-image">
            <img class="responsive-img" src="../fotos/<?php echo $dados['foto'] ?>">
            </div>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p align="center"><a style="align-self: flex-end" href="../produtos/delete.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #d32f2f red darken-2"><i class="material-icons left">delete</i></a> <a style="align-self: flex-end" href="../produtos/editar.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #1e88e5 blue darken-1 "><i class="material-icons left">create</i></a></p>
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

<br>

<div class="container">
<h4>Dermocosméticos: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel3">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE idtipo = 3";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card medium hoverable z-depth-3">
            <span class="card-title" style="font-size: 16px; font-weight: bold;"><blockquote><?php echo $dados['nome']; ?></blockquote></span>
            <div class="card-image">
            <img class="responsive-img" src="../fotos/<?php echo $dados['foto'] ?>">
            </div>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p align="center"><a style="align-self: flex-end" href="../produtos/delete.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #d32f2f red darken-2"><i class="material-icons left">delete</i></a> <a style="align-self: flex-end" href="../produtos/editar.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #1e88e5 blue darken-1 "><i class="material-icons left">create</i></a></p>
          </div>
          </div>
          </div>
        </div>

        <?php
        }
      }else{
        ?>
        <div class="owl-item">
            <p>Não há Produtos de Dermocosméticos cadastrados!</p>
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
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="ante"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proxi"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>

<br>

<div class="container">
<h4>Suplementos: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel4">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE idtipo = 4";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card medium hoverable z-depth-3">
            <span class="card-title" style="font-size: 16px; font-weight: bold;"><blockquote><?php echo $dados['nome']; ?></blockquote></span>
            <div class="card-image">
            <img class="responsive-img" src="../fotos/<?php echo $dados['foto'] ?>">
            </div>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p align="center"><a style="align-self: flex-end" href="../produtos/delete.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #d32f2f red darken-2"><i class="material-icons left">delete</i></a> <a style="align-self: flex-end" href="../produtos/editar.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #1e88e5 blue darken-1 "><i class="material-icons left">create</i></a></p>
          </div>
          </div>
          </div>
        </div>

        <?php
        }
      }else{
        ?>
        <div class="owl-item">
            <p>Não há Produtos de Suplementos cadastrados!</p>
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
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="anter"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proxim"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>


<!-- Footer -->
<footer class="page-footer #29b6f6 light-blue lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Farmácia</h5>
                <p class="grey-text text-lighten-4">Aqui você encontra os melhores produtos pelos melhores preços.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contato</h5>
                <ul>
                  <li><p><h6>Farmacia@farmacia.com</h6></p></li>
                  <li><p><h6>(55)9 84088361</h6></p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 Matheus Vaz Flores
            </div>
          </div>
        </footer>

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

#search{
  animation: search 1s 1.5s ease infinite;
}

@keyframes search{
  0%{
    transform: translateY(0px);
  }
  50%{
    transform: translateY(-5px);
  }
  0%{
    transform: translateY(0px);
  }
}

</style>

<!-- Jquery's and JS-->
<script>
$(document).ready(function(){
    $('.slider').slider({indicators: false});

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


    var owl3 = $("#carousel3");

    owl3.owlCarousel({
    items: 5
  });

    $('#ante').on('click', function(){
      owl3.trigger('prev.owl.carousel');
    })

    $('#proxi').on('click', function(){
      owl3.trigger('next.owl.carousel');
    })

    var owl4 = $("#carousel4");

    owl4.owlCarousel({
    items: 5
  });

    $('#anter').on('click', function(){
      owl4.trigger('prev.owl.carousel');
    })

    $('#proxim').on('click', function(){
      owl4.trigger('next.owl.carousel');
    })

});
     
</script>

</body>
</html>