<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="icon.jpg">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
</head>
<body>

<?php
include "../bd/conexao.php";

if (isset($_POST['action'])) {
	$tipo = $_POST['tipo'];
	$nome = $_POST['nome'];
	$valor = $_POST['valor'];
	$disponibilidade = $_POST['disponibilidade'];
  $informacao = $_POST['informacao'];
  $indicacao = $_POST['indicacao'];
  $beneficio = $_POST['beneficio'];
  $modo = $_POST['modo'];
  $recomendacao = $_POST['recomendacao'];
  $quantidade = $_POST['qtd'];
  $outro = $_POST['outro'];

  if ($tipo == $outro) {
    $outro = '';
  }

  if (!empty($outro)) {
    $tipo = $outro;

    $sql1 = "INSERT INTO tipo(nome) VALUES ('$tipo')";
    mysqli_query($connect, $sql1);

  }

	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
	$novo_nome = md5(time()).$extensao;
	$diretorio = "../fotos/";

  if ($disponibilidade == 'NoDisponivel') {
    $quantidade = 0;
  }

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

$sql2 = "SELECT id FROM tipo WHERE nome = '$tipo'";
$resultado2 = mysqli_query($connect, $sql2);
$dados = mysqli_fetch_array($resultado2);

$idtipo = $dados[0];


	$sql = "INSERT INTO produto (idtipo, nome, valor, disponibilidade, foto, informacao, indicacao, beneficio, modo, recomendacao, quantidade) VALUES ('$idtipo','$nome', $valor, '$disponibilidade', '$novo_nome', '$informacao', '$indicacao', '$beneficio', '$modo', '$recomendacao', '$quantidade')";

    if (mysqli_query($connect,$sql)){
    ?>
    <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de produto</h4>
      <p>O produto foi cadastrado com sucesso!</p>
    </div>
    <div class="modal-footer">
      <a href="adm.php" class="modal-close waves-effect waves-green btn-flat #4caf50 green"> <div style="color: white">Ok</div></a>
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
      <a href="adm.php" class="modal-close waves-effect waves-green btn-flat #4caf50 green"><div style="color: white">Ok</div></a>
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