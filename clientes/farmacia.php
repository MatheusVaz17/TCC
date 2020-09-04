<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="../owl.carousel.min.js"></script>
<link rel="stylesheet" href="../owl.carousel.min.css">
<link rel="stylesheet" href="../owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../estilo_botoes/estilo.css">
<link rel="stylesheet" type="text/css" href="chat.css">
</head>
<body bgcolor="#a2d9ff">
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
}else {
include "../bd/conexao.php";
$logado = $_SESSION['email'];

if($_SESSION['check'] == false) {
?>

<script type="text/javascript">

setTimeout(function() {
    window.location.href = "../sair.php";
}, 1800000);

</script>
<?php
}

$sql = "SELECT * FROM carrinho WHERE email = '$logado'";
$resultado = mysqli_query($connect, $sql);

$sql = "SELECT * FROM usuarios WHERE email = '$logado'";
$foto = mysqli_query($connect, $sql);
if(mysqli_num_rows($foto) > 0){ 
while ($dados = mysqli_fetch_array($foto)) { 

$resultFoto = $dados['foto'];


?>

<!-- Navbar -->
<form method="post" action="confirma.php">
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a  class="brand-logo"><img src="../logo.png" align="center"></a>
      <ul class="right hide-on-med-and-down">
                <li>
                   <div class="center row">
                      <div class="col s12 " >
                        <div class="row" id="topbarsearch">
                          <div class="input-field col s6 s12 white-text">
                            
                            <?php
                              $sql = "SELECT nome FROM produto";
                              $result = mysqli_query($connect, $sql);
                              if(mysqli_num_rows($result) > 0){ 
                              while ($dados1 = mysqli_fetch_array($result)) { 
                              $rows[] = $dados1;
                              }
                              }
                              ?>

                              <datalist id="produtos">
                                <?php 
                                 foreach ($rows as $dados1) {
                                 echo '<option value='.$dados1['nome'].'>';
                                  }
                                  ?>
                                </datalist>
                            <input type="text" placeholder="Pesquisar" list="produtos" id="autocomplete-input" name="search" class="autocomplete white-text" >
                            </div>
                          </div>
                        </div>
                      </div>         
                  </li>
        <li><input id="search" type="image" name="search" list="produtos" value="submit" src="search.svg" width="30" height="60">
        </li>      
        <li><a href="carrinho.php" class="#29b6f6 light-blue lighten-1">Carrinho: <?php echo mysqli_num_rows($resultado); ?> <i class="material-icons left">shopping_cart</i></a></li>
        <li><a href="#" data-target="slide-out" class="sidenav-trigger show-on-large #29b6f6 light-blue lighten-1"><i class="material-icons">menu</i></a></li>
      </ul>
      </div>
    </div>
    </nav>
  </div>
  </form>
</div>


<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <a><img style="width: 100%" src="../fotos/clientes/<?php echo $dados['foto'] ?>"></a>
    </div>
    <li><a><span class="black-text name"><blockquote><b><?php echo $login." ".$dados['sobrenome'];?></b></blockquote></span></a></li>
    <li><a><span class="black-text email"><b><?php echo $logado; ?></span></b></a></li>
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


<!--Medicamentos-->
<div class="section" style="background-color: rgb(255,255,255);">
<div class="container">

  <h4>Medicamentos:</h4>
  <div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel1">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql = "SELECT * FROM produto WHERE tipo = 'Medicamento' AND quantidade > 0";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable z-depth-3">
            <span class="card-title"><h5><blockquote><?php echo $dados['nome']; ?></blockquote></h5></span>
            <p><img height="120" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="right: -10%" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-4"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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

</div>
<div class="header">
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">

  <path class="wave-1" fill="#204D6B"  d="M0,128L40,138.7C80,149,160,171,240,154.7C320,139,400,85,480,80C560,75,640,117,720,138.7C800,160,880,160,960,176C1040,192,1120,224,1200,245.3C1280,267,1360,277,1400,282.7L1440,288L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>


  <path class="wave2" fill="#0099ff" fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>

  <!--
  <path class="wave-3" fill="#a2d9ff" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,112C672,139,768,181,864,208C960,235,1056,245,1152,218.7C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path> -->

  <path class="wave-3" fill="#a2d9ff" fill-opacity="3" d="M0,32L60,42.7C120,53,240,75,360,112C480,149,600,203,720,202.7C840,203,960,149,1080,149.3C1200,149,1320,203,1380,229.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>

  

</svg>
  </div>
<?php
if (mysqli_num_rows($resultado) > 5) {
?>
<div class="navegacao">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="anterior"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proximo"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>



<!--Higiene-->
<div class="container">

<h4>Higiene: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel2">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE tipo = 'Higiene' AND quantidade > 0";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable z-depth-3">
            <span class="card-title"><h5><blockquote><?php echo $dados['nome']; ?></blockquote></h5></span>
            <p><img height="120" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="right: -10%" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-4"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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


<!--Dermocosméticos-->

<div class="container">
  <div class="section">
<h4>Dermocosméticos: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel3">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE tipo = 'Dermocosmeticos' AND quantidade > 0";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable z-depth-3">
            <span class="card-title"><h5><blockquote><?php echo $dados['nome']; ?></blockquote></h5></span>
            <p><img height="120" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="right: -10%" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-4"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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

<!--Suplementos-->

<div class="container">
<div class="section">
<h4>Suplementos: </h4>
<div class="row">
  <div class="owl-carousel owl-theme owl-loaded" id="carousel4">
    <div class="owl-stage-outer">
      <div class="owl-stage">
<?php
$sql1 = "SELECT * FROM produto WHERE tipo = 'Suplementos' AND disponibilidade ='Disponivel'";
        $resultado1 = mysqli_query($connect, $sql1);
        if(mysqli_num_rows($resultado1) > 0){
        while ($dados = mysqli_fetch_array($resultado1)){
        ?>
        <div class="owl-item">
            <div class="col s12 m12">
          <div class="card small hoverable z-depth-3">
            <span class="card-title"><h5><blockquote><?php echo $dados['nome']; ?></blockquote></h5></span>
            <p><img height="120" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="right: -10%" href="<?php echo'addprodutos.php?id='.$dados['id']; ?>" class="waves-effect waves-light btn z-depth-4"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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
</div>
<?php
if (mysqli_num_rows($resultado1) > 5) {
?>
<div class="navegacao1">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="anter"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proxim"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>

<!-- Botão chat -->

<div class="container">

<div class="fixed-action-btn">
  <a class="btn-floating btn-large red" id="iconchat" href="#messages">
    <i class="large material-icons">chat</i>
  </a>
  <ul id="ulchat">
   
    <form>
      <div id="messages" class="col s6 pull-s8">
    <div id="messages"></div>
  <input type="text" id="mensagem" value="Digite sua mensagem" name="message" placeholder="Digite sua mensagem">
  <button type="submit" class="btn green"><i class="material-icons left">chat</i>Enviar</button>
  <a class="btn red" id="chat">Fechar <i class="material-icons right">close</i></a>

  </div>
    </form>
   
  </ul>
</div>

</div>

<!-- Footer -->
<footer class="page-footer #29b6f6 light-blue lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Farmácia On-line</h5>
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

html, body {
    height: 100%;
  }

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

section{
  display: flex;
}

.header{
  position: relative;
  
  padding: 10px 50px;
  margin: 0px;
  width: 100%;
}

.waves{
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
}

.wave-1{
  animation: moveWave1 1.5s ease-in-out infinite alternate;
 
}

@keyframes moveWave1{
  from{
    transform: translateX(50px);
  }
  to{
    transform: translateX(200px);
  }
}

.wave2{
  animation: moveWavedois 3s 0.5s ease-in-out infinite alternate;
 
}

@keyframes moveWavedois{
  from{
    transform: translateX(150px);
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
function nav(){
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
}

$(document).ready(function(){
    $('.slider').slider({indicators: false});
    $('.sidenav').sidenav({edge: 'right'});


    var owl1 = $("#carousel1");
    owl1.owlCarousel({
		responsive: {
  0:{
    items: 1
  },
  300:{
    items: 1
  },
  600:{
    items: 2
  },
  700:{
    items: 3
  },
  1000: {
    items: 5
  }
}
	});

    $('#anterior').on('click', function(){
      owl1.trigger('prev.owl.carousel');
    })

    $('#proximo').on('click', function(){
      owl1.trigger('next.owl.carousel');
    })
	
	var owl2 = $("#carousel2");

    owl2.owlCarousel({
		responsive: {
  0:{
    items: 1
  },
  600:{
    items: 2
  },
  700:{
    items: 2
  },
  1000: {
    items: 5
  }
}
	});

    $('#ant').on('click', function(){
      owl2.trigger('prev.owl.carousel');
    })

    $('#prox').on('click', function(){
      owl2.trigger('next.owl.carousel');
    })

    var owl3 = $("#carousel3");

    owl3.owlCarousel({
    responsive: {
  0:{
    items: 1
  },
  600:{
    items: 2
  },
  700:{
    items: 3
  },
  1000: {
    items: 5
  }
}
  });

    $('#ante').on('click', function(){
      owl3.trigger('prev.owl.carousel');
    })

    $('#proxi').on('click', function(){
      owl3.trigger('next.owl.carousel');
    })

    var owl4 = $("#carousel4");

    owl4.owlCarousel({
    responsive: {
  0:{
    items: 1
  },
  600:{
    items: 2
  },
  700:{
    items: 3
  },
  1000: {
    items: 5
  }
}
  });

    $('#anter').on('click', function(){
      owl4.trigger('prev.owl.carousel');
    })

    $('#proxim').on('click', function(){
      owl4.trigger('next.owl.carousel');
    })


$('.fixed-action-btn').floatingActionButton({hoverEnabled: false});
$("#iconchat").click(function(){
    $("#iconchat").hide();
    $("#ulchat").show();
});

$("#chat").click(function(){
    $("#iconchat").show();
    $("#ulchat").hide();
});


});

     
</script>


</body>
</html>
<?php
}
?>