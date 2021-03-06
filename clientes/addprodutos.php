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
<link rel="icon" href="../fav.png" />
</head>
<body>
<?php
session_start();

include "../bd/conexao.php";
$id = $_GET['id'];
$comprar = $_GET['comprar'];

if ($comprar == 1) {
  $login = $_COOKIE['login'];
}

if ($comprar == 1) {
  $idUsuario = $_SESSION['id'];
}


if ($comprar == 1) {
$sql1 = "SELECT cep FROM usuarios WHERE id = '$idUsuario'";
$resultado1 = mysqli_query($connect, $sql1);
    if(mysqli_num_rows($resultado1) > 0){ 
        $dados1 = mysqli_fetch_array($resultado1);
}
}

$sql = "SELECT produto.nome, produto.valor, produto.disponibilidade, produto.foto, produto.informacao, produto.indicacao, produto.beneficio, produto.modo, produto.recomendacao, produto.quantidade, tipo.nome  FROM produto, tipo WHERE produto.idtipo = tipo.id AND produto.id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>
<!-- Navbar -->
<div class="navbar">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a class="brand-logo"><img align="center" src="../logo.png"></a>
      <ul class="right hide-on-med-and-down">
        <?php
        if ($comprar == 1) {
        ?>
        <li><i class="material-icons right">person_pin</i>Bem vindo(a) <?php echo $login;  ?></li>
        <?php
        } 
        ?>
      </ul>
    </div>
  </div>
  </nav>
</div>

<div class="container" >

    <form action="confirmaproduto.php" method="post">
        <div class="row">
            <div class="col s3">
    	<p><h5><?php echo $dados[0]." - ". $dados[10]; ?></h5></p><br>
        <p><h6><b>Informações sobre o produto:</b></h6></p>
        <p style="font-family: cambria"><?php echo $dados['informacao']; ?></p>
        <p><h6><a href="#descricao">Ler descrições</a></h6></p>
            </div>
            <div class="col s4" style="width: 30%">
              <div class="zoom" style="cursor: zoom-in;">
        <p><img width="400" class="materialboxed" height="400" src="../fotos/<?php echo $dados['foto'] ?>"></p>
              </div>
            </div>
            
            <?php
            if ($dados['quantidade'] > 0) {
              ?>
              <div class="col s5 push-m1">
              <br><br><br>
        <p><b><h6><div><?php echo "Preço: R$".preg_replace('/[^0-9]+/',',',$dados['valor']); ?></div></h6></b>
          <h6 ><b>Quantidade: <input value="1" type="number" name="quantidade"  style="max-width: 42%; border-radius: 4px; border-width: 1px; border-color: #29b6f6" min="1" max="<?php echo $dados['quantidade'] ?>" required></b></h6></p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <?php
        if ($comprar == 1) {
        ?>
        <a href="farmacia.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Cancelar</div></a>
        <?php
        }

        if ($comprar == 0) {
        ?>
        <a href="../index.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Cancelar</div></a>
        <?php
        }


        if ($comprar == 1) {
        ?>
        <button class="btn green" type="submit"><div style="color: white">Confirmar</div></button>
        <?php
        }
        if ($comprar == 0) {
        ?>
        <a class="btn green modal-trigger" href="#modal1"><div style="color: white">Confirmar</div></a>
        <?php
        }
        ?>

        <?php
        if ($comprar == 1) {
        ?>
        <p><h6>Preço para o cep: <b> <?php echo $dados1['cep']; ?> </b><i class="material-icons">location_on</i><br></p>
        <p><h6>Esse não é seu cep? Mude na pagina de usuário.</h6></p>
        <?php } ?>
        </div>
            <?php
            }else{
            ?>
            <div class="col s5 push-m1">
              <br><br><br>
              <p><b><h6>Produto indisponível para compra! <br> Em breve colocaremos no estoque.</h6></b></p>
              <?php 
              if ($comprar == 1) {
              ?>
              <a href="farmacia.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Voltar</div></a>
              <?php
              }
              
              
              if ($comprar == 0) {
              ?>
              <a href="../index.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Voltar</div></a>
              <?php
              }
              ?>

            </div>
            <?php
            }
            ?>
        
    </div>

<div id="descricao">
    <div class="row">
    <?php
    if ($dados['indicacao'] != null) {
    ?>
    <div class="col s3">
    <p><h5><b>Indicação: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['indicacao']; ?></p>
    </div>
    <?php
    } 
    ?>

    <?php
    if ($dados['beneficio'] != null) {
    ?>
    <div class="col s3">
    <p><h5><b>Benefícios: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['beneficio']; ?></p>
    </div>
    <?php
    } 
    ?>

    <?php
    if ($dados['modo'] != null) {
    ?>
    <div class="col s3">
    <p><h5><b>Modo de uso: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['modo']; ?></p>
    </div>
    <?php
    } 
    ?>

    <?php
    if ($dados['recomendacao'] != null) {
    ?>
    <div class="col s3">
    <p><h5><b>Recomendações: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['recomendacao']; ?></p>
    </div>
    <?php
    }
    ?>
    </div>
</div>

</form>

</div>

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Comprar produto</h4>
      <p>Para realizar a compra de produtos você deve estar logado no sistema!</p>
    </div>
    <div class="modal-footer">
      <a href="entrar.php" class="modal-close waves-effect waves-green btn-flat # c62828 red darken-3" style="color: white">Login</a>
      <a href="cadastro.php" class="modal-close waves-effect waves-green btn-flat #1e88e5 blue darken-1" style="color: white">Cadastre-se</a>
    </div>
  </div>

<style>

.zoom {
  overflow: hidden;
}

.zoom img {
  max-width: 100%;
  -moz-transition: all 0.3s;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.zoom:hover img {
  -moz-transform: scale(1.5);
  -webkit-transform: scale(1.5);
  transform: scale(1.5);
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

</style>

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

<script type="text/javascript">
  $(document).ready(function(){
    $('.materialboxed').materialbox();
    $('.modal').modal();
  });
</script>
</body>
<?php
}
}


?>