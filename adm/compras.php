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
<script type="text/javascript" src="consulta.js"></script>
</head>
<body>
<?php

session_start();
if((!isset ($_SESSION['id']) == '1') or (!isset ($_SESSION['id'])))
{
  unset($_SESSION['id']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }

include "../bd/conexao.php";
$idUsuario = $_SESSION['id'];

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
  <form method="POST" action=''>

    <div class="row" id="topbarsearch">
       <div class="input-field col m4 s12 black-text">
                            
         <input type="text" placeholder="Pesquisar por email" id="pesquisa" name="search" class="autocomplete black-text" size="50" >
          </div>
          <table class="resultado">
          </table>
    </div>

  </form>
</div>  

<div class="container">

<h5>Compras realizadas:</h5>

          <table class="responsive-table">
            <thead>
              <tr>
                <th>Cliente:</th>
                <th>Produtos:</th>
                <th>Quantidade:</th>
                <th>Valor:</th>
                <th>Data da compra:</th>
              </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM pagamentos INNER JOIN usuarios ON pagamentos.idusuario = usuarios.id INNER JOIN produto_pedido ON produto_pedido.idpagamento = pagamentos.id WHERE pedido = 'A encaminhar produto'";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) > 0):
                while ($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                  <td><?php echo $dados['email']; ?></td>
                  <td><?php echo $dados['produtos']; ?></td>
                  <td><?php echo $dados['quantidade']; ?></td>
                  <td>R$<?php echo $dados['valor']; ?></td>
                  <td><?php echo $dados['data']; ?></td>
                  <td><a class="btn green white-text buttonid" data-id="<?php echo $dados[0]; ?>"><i class="material-icons">check</i></a>
                  <a class="btn blue white-text" href="perfilcliente.php?email=<?php echo $dados['email']; ?>"><i class="material-icons">account_circle</i></a></td>

                   <!-- Modal Structure -->
                <div id="modal1" class="modal">
                  <div class="modal-content">
                    <h4>Confirmar encaminhamento</h4>
                    <p>Você deseja confirmar o encaminhamento desse produto?</p>
                  </div>
                  <div class="modal-footer">
                    <a href="#" type="button" class="modal-close waves-effect waves-green btn-flat green white-text delete-yes">Sim</a>
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat red white-text">Não</a>
                  </div>
                </div>

                </tr>
                <?php
                endwhile;
              else:
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
              endif;
              ?>
            </tbody>

          </table>
</div>


<div class="container">

<h5>Compras Encaminhadas:</h5>

          <table class="responsive-table">
            <thead>
              <tr>
                <th>Cliente:</th>
                <th>Produtos:</th>
                <th>Quantidade:</th>
                <th>Valor:</th>
                <th>Data da compra:</th>
              </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM pagamentos INNER JOIN usuarios ON pagamentos.idusuario = usuarios.id INNER JOIN produto_pedido ON produto_pedido.idpagamento = pagamentos.id WHERE pedido ='Encaminhado'";
                $resultado = mysqli_query($connect, $sql);
                if (mysqli_num_rows($resultado) > 0):
                while ($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                  <td><?php echo $dados['email']; ?></td>
                  <td><?php echo $dados['produtos']; ?></td>
                  <td><?php echo $dados['quantidade']; ?></td>
                  <td>R$<?php echo $dados['valor']; ?></td>
                  <td><?php echo $dados['data']; ?></td>
                  <td><button disabled class="btn green white-text"><i class="material-icons">check</i></button>
                  <a class="btn blue white-text" href="perfilcliente.php?email=<?php echo $dados['email']; ?>"><i class="material-icons">account_circle</i></a></td>

                </tr>
                <?php
                endwhile;
              else:
                ?>
                <tr>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <?php
              endif;
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

<script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();
    $('.buttonid').on('click', function(event){
      var id = $(this).data('id');
      $('a.delete-yes').attr('href', 'confirmacompra.php?id=' +id);
      $('#modal1').modal('open');
    });
  });
</script>

</body>
</html>