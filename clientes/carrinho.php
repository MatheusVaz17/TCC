<?php
$login = $_COOKIE['login'];
session_start();
include "../bd/conexao.php";
$logado = $_SESSION['email'];
?>

<!DOCTYPE html>
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
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <a href="#!" class="brand-logo">Health Farm</a>
      <ul class="right hide-on-med-and-down">
        <li><i class="material-icons right">person_pin</i>Bem vindo(a) <?php echo $login;  ?></li>
      </ul>
    </div>
  </nav>
</div>
<div class="row">
  <div class="col s12">
    <h3 class="light">Carrinho de compras</h3>
    <table class="striped">
      <thead>
        
        <tr>
          <th>Nome:</th>
          <th>Preço:</th>
          <th>Quantidade:</th>
          <th>Valor total</th>
        </tr>
      </thead>
      
      <tbody>


<?php
$sql = "SELECT * FROM carrinho WHERE email = '$logado'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>

		<tr>
			<td><?php echo $dados['nome']; ?></td>
			<td><?php echo $dados['preco']; ?></td>
			<td><?php echo $dados['quantidade']; ?></td>
			<td><?php echo $dados['valor']; ?></td>
			<td><a href="confirmar.php?id=<?php echo $dados['id']; ?>" class="btn-floating green"><i class="material-icons">check
</i></a>

            <a class="waves-effect waves-light btn-floating modal-trigger red" href="#modal1"><i class="material-icons">delete</i></a></td>
		</tr>
	</tbody>

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
</body>
</html>