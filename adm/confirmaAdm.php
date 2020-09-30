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
<link rel="stylesheet" href="../owl.carousel.min.css">
<link rel="stylesheet" href="../owl.theme.default.min.css">
<link rel="icon" href="../fav.png" />
</head>
<body>
<?php

require "../bd/conexao.php";
$nome = $_POST['search'];

$sql = "SELECT * FROM produto WHERE nome = '$nome'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){  
while($dados = mysqli_fetch_array($result)){
?>
<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 align="center"><?php echo $dados['nome']; ?></h4>
      <p align="center"><img width="100" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p>
      <p align="center">Valor: <b>R$<?php echo $dados['valor']; ?></b></p>
    </div>
   
            <p align="center"><a style="align-self: flex-end" href="../produtos/delete.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #d32f2f red darken-2"><i class="material-icons left">delete</i></a> <a style="align-self: flex-end" href="../produtos/editar.php?id=<?php echo $dados['id'] ?>" class="waves-effect waves-light btn-floating #1e88e5 blue darken-1 "><i class="material-icons left">create</i></a></p>
    
  </div>
<?php
}
}
?>

<script type="text/javascript">
	$(document).ready(function(){
    $('.modal').modal();
    $('#modal1').modal('open');

    var owl1 = $("#carousel1");
    owl1.owlCarousel({
    items: 5
  });
  });
</script>
<?php
?>
</body>
</html>