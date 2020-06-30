<?php
include "bd/conexao.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Farm</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="icon.jpg">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script src="owl.carousel.min.js"></script>
<link rel="stylesheet" href="owl.carousel.min.css">
<link rel="stylesheet" href="owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="estilo_botoes/estilo.css">
</head>
<body>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <a href="#!" class="brand-logo">Health Farm</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">search</i>Procurar produtos</a></li>
        <li><a href="clientes/entrar.php"><i class="material-icons left">person_pin</i>Entrar</a></li>
      </ul>

    </div>
  </nav>
</div>

<!-- Slider -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="img1.png"> <!-- random image -->
        <div class="caption center-align">
        </div>
      </li>
      <li>
        <img src="img2.jpg"> <!-- random image -->
        <div class="caption left-align">
        </div>
      </li>
      <li>
        <img src="img3.jpg"> <!-- random image -->
        <div class="caption right-align">
        </div>
      </li>
      <li>
        <img src="img4.jpg"> <!-- random image -->
        <div class="caption center-align">
        </div>
      </li>
    </ul>
  </div>

<!--Products-->
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
            <div class="col s12 m10">
          <div class="card small hoverable">
            <span class="card-title"><?php echo $dados['nome']; ?></span>
            <p><img width="130" height="100" src="fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="align-self: flex-end" href="#modal1" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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

<?php
if (mysqli_num_rows($resultado) > 5) {
?>
<div class="navegacao">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="anterior"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="proximo"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>


<br>
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
            <div class="col s12 m10">
          <div class="card small hoverable">
            <span class="card-title"><?php echo $dados['nome']; ?></span>
            <p><img width="130" height="100" src="fotos/<?php echo $dados['foto'] ?>"></p>
            <div class="card-action">
              <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="align-self: flex-end" class="waves-effect waves-light btn"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
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
<?php
if (mysqli_num_rows($resultado1) > 5) {
?>
<div class="navegacao1">
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="ant"> <i class="material-icons">chevron_left</i></button>
<button class="btn waves-effect waves-light #29b6f6 light-blue lighten-1" id="prox"><i class="material-icons">chevron_right</i></button>
</div>
<?php } ?>

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Comprar produto</h4>
      <p>Para realizar a compra de produtos você deve estar logado no sistema!</p>
    </div>
    <div class="modal-footer">
      <a href="clientes/entrar.php" class="modal-close waves-effect waves-green btn-flat # c62828 red darken-3" style="color: white">Login</a>
      <a href="clientes/cadastro.php" class="modal-close waves-effect waves-green btn-flat #1e88e5 blue darken-1" style="color: white">Cadastre-se</a>
    </div>
  </div>


<!-- Jquery's and JS-->
<script>
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

$(document).ready(function(){
    $('.modal').modal();
  });


});

     
</script>


</body>
</html>