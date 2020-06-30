<html>
<head>
	<title>Health Farm</title>
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
session_start();
$login = $_COOKIE['login'];
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  echo"<script> alert('Você precisa estar logado para acessar essa página!');window.location
        .href='entrar.php';</script>";
  }
include "../bd/conexao.php";
$id = $_GET['id'];
$email = $_SESSION['email'];

$sql1 = "SELECT cep FROM usuarios WHERE email = '$email'";
$resultado1 = mysqli_query($connect, $sql1);
    if(mysqli_num_rows($resultado1) > 0){ 
        while ($dados1 = mysqli_fetch_array($resultado1)){

$sql = "SELECT * FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <a href="#!" class="brand-logo">Farmácia</a>
      <ul class="right hide-on-med-and-down">
        <li><i class="material-icons right">person_pin</i>Bem vindo(a) <?php echo $login;  ?></li>
      </ul>
    </div>
  </nav>
</div>
    <form action="confirmaproduto.php" method="post">
        <div class="row">
            <div class="col s3">
    	<p><h5><?php echo $dados['nome']; ?></h5></p><br>
        <p><h6><b>Informações sobre o produto:</b></h6></p>
        <p style="font-family: cambria"><?php echo $dados['informacao']; ?></p>
        <p><h6><a href="#descricao">Ler descrições</a></h6></p>
            </div>
            <div class="col s3">
        <p><img width="400" height="400" src="../fotos/<?php echo $dados['foto'] ?>"></p>
            </div>
            <div class="col s5">
        <p><h6 align="center"><b><h5><div style="font-family: didot"><?php echo "Preço: R$".$dados['valor']; ?></div></h5></b></h6></p>
        <br>
        <p><h6 align="center"><b>Quantidade: <input type="number" name="quantidade"  style="max-width: 42%; border-radius: 4px; border-width: 1px; border-color: #29b6f6" min="1" max="10" required></b></h6></p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <center>
        <a href="farmacia.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Cancelar</div></a>
        <button class="btn green" type="submit"><div style="color: white">Confirmar</div></button> 
        <p align="center"><h6>Preço para o cep: <b> <?php echo $dados1['cep']; ?> </b><i class="material-icons">location_on</i><br></p>
        <p align="center"><h6>Esse não é seu cep? Mude na pagina de usuário.</h6></p>
        </center>
        </div>
        
    </div>

<div id="descricao">
    <div class="row">
    <div class="col s3">
    <p><h5><b>Indicação: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['indicacao']; ?></p>
    </div>

    <div class="col s3">
    <p><h5><b>Benefícios: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['beneficio']; ?></p>
    </div>

    <div class="col s3">
    <p><h5><b>Modo de uso: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['modo']; ?></p>
    </div>

    <div class="col s3">
    <p><h5><b>Recomendações: </b></h5></p>
    <p style="font-family: cambria"><?php echo $dados['recomendacao']; ?></p>
    </div>
    </div>
</div>

</form>

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
</body>
<?php
}
}
}
}
?>