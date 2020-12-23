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

$sql = "SELECT * FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>


<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 align="center">Excluir Produto</h4>
      <p align="center">Tem certeza que deseja excluir esse produto?</p>
      <p align="center"><img width="100" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p>
      <p align="center"><b><?php echo $dados['nome']; ?></b></p>
      <p align="center">Valor: <b>R$<?php echo preg_replace('/[^0-9]+/',',',$dados['valor']); ?></b></p>
    </div>
    <div class="modal-footer">
    <p align="center" style="margin-top: -1%">
    <a href="../adm/adm.php" class="modal-close waves-effect waves-green btn red">Cancelar</a>
    <a href="confirmdelete.php?id=<?php echo $dados['id'] ?>" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </p>
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