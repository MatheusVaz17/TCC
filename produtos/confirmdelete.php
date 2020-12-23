<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link rel="icon" href="../fav.png" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</head>
<body>
<?php
session_start();
if($_SESSION['id'] != 1)
{
  echo"<script> alert('Você precisa estar logado como funcionário para acessar essa página!');window.location
        .href='entrar.php';</script>";
}else{ 
include "../bd/conexao.php";
}
$id = $_GET['id'];

$sql1 = "SET foreign_key_checks = 0";
mysqli_query($connect, $sql1);
$sql = "DELETE FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);

if ($resultado) {
?>

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Deletar produto</h4>
      <p>Produto deletado com sucesso!</p>
    </div>
    <div class="modal-footer" style="color: white">
      	<a href="../adm/adm.php" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </div>
  </div>

<?php
}else{
?>
	<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Deletar produto</h4>
      <p>Erro ao deletar produto!</p>
    </div>
    <div class="modal-footer" style="color: white">
      	<a href="../adm/adm.php" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </div>
  </div>

<?php
}

$sql2 = "SET foreign_key_checks = 1";
mysqli_query($connect, $sql2);

?>

<script type="text/javascript">
	$(document).ready(function(){
	$('.modal').modal();
    $('.modal').modal('open');
  });
</script>
</body>
</html>