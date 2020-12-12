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
if((!isset ($_SESSION['email']) == 'farmacia@farmacia.com') and (!isset ($_SESSION['senha']) == 'administrador00'))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }

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

?>
<!-- Navbar -->

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a href="#!" class="brand-logo"><img src="../logo.png" align="center"></a>
      </div>
      <ul class="right hide-on-med-and-down">
        <li><a href="adm.php">Voltar</a></li>
      </ul>
    </div>
  </nav>
  </div>

<div class="container">

<h5>Compras realizadas:</h5>

          <table>
            <thead>
              <tr>
                <th>Cliente:</th>
                <th>Produtos:</th>
                <th>Quantidade:</th>
                <th>Valor:</th>
                <th>Data:</th>
              </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM pagamentos";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                while ($dados = mysqli_fetch_array($resultado)) {
                ?>
                <tr>
                  <td><?php echo $dados['email']; ?></td>
                  <td><?php echo $dados['produtos']; ?></td>
                  <td><?php echo $dados['quantidade']; ?></td>
                  <td>R$<?php echo $dados['valor']; ?></td>
                  <td><?php echo $dados['data']; ?></td>
                  <td><a class="btn green white-text" href="confirmacompra.php?id=<?php echo $dados['id']; ?>"><i class="material-icons">check</i></a>
                  <a class="btn blue white-text" href="perfilcliente.php?email=<?php echo $dados['email']; ?>"><i class="material-icons">account_circle</i></a></td>
                </tr>
                <?php
                }
              }else{
                ?>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>--</td>
                </tr>
                <?php
              }
              ?>
            </tbody>

          </table>
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