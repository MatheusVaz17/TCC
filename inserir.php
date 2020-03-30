<!DOCTYPE html>
<html>
<head>
	<title>Health Farm</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="icon.jpg">
<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</head>
<body>

<?php
include "bd/conexao.php";

if (isset($_POST['action'])) {
	$tipo = $_POST['tipo'];
	$nome = $_POST['nome'];
	$valor = $_POST['valor'];
	$disponibilidade = $_POST['disponibilidade'];

	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
	$novo_nome = md5(time()).$extensao;
	$diretorio = "fotos/";

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

	$sql = "INSERT INTO produto (tipo, nome, valor, disponibilidade, foto) VALUES ('$tipo','$nome', $valor, '$disponibilidade', '$novo_nome')";

    if (mysqli_query($connect,$sql)){
    ?>
    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de produto</h4>
      <p>O produto foi cadastrado com sucesso!</p>
    </div>
    <div class="modal-footer">
      <a href="index.php" class="modal-close waves-effect waves-green btn-flat #4caf50 green"> <div style="color: white">Ok</div></a>
    </div>
  </div>
    <?php
    }else{ 
	?>
	<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de produto</h4>
      <p>Erro ao cadastrar produto!</p>
    </div>
    <div class="modal-footer">
      <a href="index.php" class="modal-close waves-effect waves-green btn-flat #4caf50 green"><div style="color: white">Ok</div></a>
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