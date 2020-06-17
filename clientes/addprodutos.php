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
include "../bd/conexao.php";
$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 
        while ($dados = mysqli_fetch_array($resultado)){
?>
</body>

<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Adicionar produto ao carrinho</h4>
      <p>Tem certeza que deseja adicionar esse produto ao carrinho?</p>
    </div>
    <form action="confirmaproduto.php" method="post">
    	<p align="center"><?php echo $dados['nome']; ?></p>
        <p align="center"><img width="130" height="100" src="../fotos/<?php echo $dados['foto'] ?>"></p><br>
        <p><h6 align="center"><?php echo "Preço: R$".$dados['valor']; ?></h6></p>
        <p align="left">Quantidade: <input type="number" name="quantidade" width="150" min="1" required></p>
        <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="modal-footer">
        <a href="farmacia.php" class="modal-close waves-effect waves-green btn-flat red" ><div style="color: white">Cancelar</div></a>
        <button class="btn green" type="submit"><div style="color: white">Confirmar</div></button>  
        
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