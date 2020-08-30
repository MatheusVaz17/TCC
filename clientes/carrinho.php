<?php

$login = $_COOKIE['login'];
session_start();
include "../bd/conexao.php";
$logado = $_SESSION['email'];
?>

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
<script type="text/javascript" src="refresh.js"></script>
<script src="../owl.carousel.min.js"></script>
<link rel="stylesheet" href="../owl.carousel.min.css">
<link rel="stylesheet" href="../owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="../estilo_botoes/estilo.css">
</head>
<body>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a class="brand-logo" href="farmacia.php"><img src="../logo.png" align="center"></a>
      <ul class="right hide-on-med-and-down">
        <li><i class="material-icons right">person_pin</i>Bem vindo(a) <?php echo $login;  ?></li>
      </ul>
    </div>
  </div>
  </nav>
</div>

<div class="container">

<div id="resultado">

<div class="row">
  <div class="col s12">
    <h3 class="light">Carrinho de compras <i class="material-icons">shopping_cart</i></h3>
    <table class="striped">
      <thead>
        
        <tr>
          <th>Nome:</th>
          <th>Preço Unitário:</th>
          <th>Quantidade:</th>
          <th>Valor Geral:</th>
          <th>Excluir produto:</th>
        </tr>
      </thead>
      
      <tbody>


<?php

$sqlSum = "SELECT SUM(valor) FROM carrinho WHERE email = '$logado'";
$resultadoSum = mysqli_query($connect, $sqlSum);
if(mysqli_num_rows($resultadoSum) > 0){
  $dadosSum = mysqli_fetch_array($resultadoSum);
}

$sqlQuant = "SELECT SUM(quantidade) FROM carrinho WHERE email = '$logado'";
$resultadoQuant = mysqli_query($connect, $sqlQuant);
if(mysqli_num_rows($resultadoQuant) > 0){
  $dadosQuant = mysqli_fetch_array($resultadoQuant);
}

$sql = "SELECT * FROM carrinho WHERE email = '$logado'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 

          ?>
          <p align="center"><a class="waves-effect waves-light btn red z-depth-3"  href="farmacia.php"> <i class="material-icons left">keyboard_arrow_left
</i> Voltar</a> <a class="waves-effect waves-light btn green z-depth-3" href="../lib/vendor/finaliza.php?quant=<?php echo $dadosSum[0]; ?>">Confirmar compra <i class="material-icons right">check</i></a>
<a class="waves-effect waves-light btn modal-trigger red" href="#modal1" id="btnDelete"><i class="material-icons left">delete</i> Excluir</a>
</p>
          <p align="center">
            <h6 align="center"> Quantidade Total: <?php echo $dadosQuant[0]; ?> </h6>
            <h6 align="center"> Valor Total: R$<?php echo $dadosSum[0]; ?> </h6>
          </p>
          <?php
        while ($dados = mysqli_fetch_array($resultado)){
          $id = $dados['id'];

?>
		<tr>
			<td><?php echo $dados['nome']; ?></td>
			<td>R$<?php echo $dados['preco']; ?></td>
			<td><?php echo $dados['quantidade']; ?></td>
			<td>R$<?php echo $dados['valor']; ?></td>
			<td class="push-m2"><label>
        <input type="checkbox" id="check<?php echo $dados['id']; ?>" name="deletar" value="<php echo $dados['id']; ?>" />
        <span></span>
      </label>
      </td>

<!-- Modal Structure -->

  <div id="modal1" class="modal">
    <form id="form1" method="post" action="deletarCarrinho.php">
    <div class="modal-content">
      <h4>Excluir produto</h4>
      <p>Você tem certeza que deseja excluir esse produto?</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-close waves-effect waves-green btn-flat blue" style="color: white">Cancelar</a>
      <button type="submit" class="modal-close waves-effect waves-green btn-flat red white-text">Excluir</button> 
    </div>
    </form>
  </div>

		</tr>
	</tbody>

  <script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();

$("input[name=deletar]").change(function(){
  // verifica se foi selecionado
  if($(this).is(':checked')){
    // sim: mostro o campo select
    $("#btnDelete").show();
  } else {
    // não: não mostro o campo select
    $("#btnDelete").hide();
  }
});


  });


</script>

<?php
}
}else{
?>
<tr>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<?php
}
?>
</table>
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