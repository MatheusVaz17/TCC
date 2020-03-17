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
</head>
<body>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper blue darken-3">
      <a href="#!" class="brand-logo">Health Farm</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">search</i>Procurar produtos</a></li>
        <li><a href="badges.html"><i class="material-icons right">person_pin</i>Cadastre-se</a></li>
        <li><a href="registrar.html"><i class="material-icons right">add</i>Adicionar produto</a></li>
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
<?php
$sql = "SELECT * FROM produto WHERE tipo = 'Medicamento' AND disponibilidade ='Disponivel'";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0):
        while ($dados = mysqli_fetch_array($resultado)):
        ?>
            <div class="col s12 m3">
          <div class="card small hoverable">
            <span class="card-title"><?php echo $dados['nome']; ?></span>
            <p><img width="250" height="160" src="fotos/<?php echo $dados['foto'] ?>"></p>
            <p><h6><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
            <p><a style="align-self: center" class="waves-effect waves-light btn"><i class="material-icons left">add_shopping_cart</i>Comprar</a></p>
          </div>
          </div>

        <?php
        endwhile;
        ?>
        </div>
      </div>
        <?php
        else: ?>
        <p>Não há medicamentos registrados!</p>
        <?php
      endif;
?>
<!-- Jquery's and JS-->
<script>
$(document).ready(function(){
    $('.slider').slider({indicators: false});
    $('.carousel').carousel();
  });

     
</script>


</body>
</html>