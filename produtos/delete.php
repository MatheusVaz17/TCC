<!DOCTYPE html>
<html>
<head>
	<title>Health Farm</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="../icon.jpg">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</head>
<body>
<?php
session_start();
if((!isset ($_SESSION['email']) == 'farmacia@farmacia.com') and (!isset ($_SESSION['senha']) == 'administrador00'))
{
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  echo"<script> alert('Você precisa estar logado como funcionário para acessar essa página!');window.location
        .href='entrar.php';</script>";
}else{ 
include "../bd/conexao.php";
}

$id = $_GET['id'];

$sql = "SELECT * FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>


<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Excluir Produto</h4>
      <p>Tem certeza que deseja excluir esse produto?</p>
      <p><img width="100" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p>
      <p>Valor: <b>R$<?php echo $dados['valor']; ?></b></p>
    </div>
    <div class="modal-footer">
    <div style="color: white">
    <a href="../adm.php" class="modal-close waves-effect waves-green btn red">Cancelar</a>
    <a href="confirmdelete.php?id=<?php echo $dados['id'] ?>" class="modal-close waves-effect waves-green btn green">Confirmar</a>
	</div>
    </div>
  </div>

<?php
}
}
?>

<script type="text/javascript">
	$(document).ready(function(){
	$('.modal').modal();
    $('.modal').modal('open');
  });
</script>
</body>
</html>