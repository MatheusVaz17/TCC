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
<body>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <a href="#!" class="brand-logo">Farmácia</a>
      <ul class="right hide-on-med-and-down">
      </ul>
    </div>
  </nav>
</div>
<br>
<center>
<fieldset style="width: 50%">
<div class="bg">
<form action="confirmedit.php?id=<?php echo $dados['id']; ?>" method="post" enctype="multipart/form-data">
  
  <div align="left">
  <p align="left">Tipo do produto:
  <div style="width: 20%"> 
  <select name="tipo" required>
  <option value="Medicamento">Medicamento</option>
  <option value="Higiene">Higiene</option>
  <option value="Dermocosmeticos">Dermocosméticos</option>
  <option value="Alimentos">Alimentos</option>
  </select>
  </div>
  </p>
</div>

  <p align="left">Nome: <br> <input type="text" value="<?php echo $dados['nome']; ?>" name="nome" style="width: 30%" required></p>

  <p align="left">Valor: <br> <input type="text" value="<?php echo $dados['valor']; ?>" name="valor" style="width: 30%" required min="1"></p>

  <div align="left">
  <p align="left">Disponibilidade:
  <div style="width: 20%">
  <select name="disponibilidade" required>
  <option value="Disponivel">Disponivel</option>
  <option value="Não Disponivel">Não disponível</option>
  </select> </div></p> </div>
  
  <p align="left">Foto: <input required type="file" name="arquivo"></p>

<div align="left">
  <p align="left"><b>Informações sobre o produto:</b></p>
  <textarea required maxlength="500" name="informacao" style="max-width: 70%"><?php echo $dados['informacao']; ?></textarea>  
</div>

<div align="left">
  <p align="left"><b>Indicação:</b></p>
  <textarea required maxlength="500" name="indicacao" style="max-width: 70%"><?php echo $dados['indicacao']; ?></textarea>  
</div>

<div align="left">
  <p align="left"><b>Benefícios:</b></p>
  <textarea required maxlength="500" name="beneficio" style="max-width: 70%"><?php echo $dados['beneficio']; ?></textarea>  
</div>

<div align="left">
  <p align="left"><b>Modo de usar:</b></p>
  <textarea required maxlength="500" name="modo" style="max-width: 70%"><?php echo $dados['modo']; ?></textarea>  
</div>

<div align="left">
  <p align="left"><b>Recomendações gerais:</b></p>
  <textarea required maxlength="500" name="recomendacao" style="max-width: 70%"><?php echo $dados['recomendacao']; ?></textarea>  
</div>

<div align="left">
  <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
    <i class="material-icons right">send</i>
  </button>
</div>

</form>
</div>
</fieldset>
</center>

<?php
}
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>

<style type="text/css">
  .bg{
    background-image: url("../bg.png");
    background-repeat: no-repeat;
    background-size: 20%;
    background-position: 100% 100%;
  }

</style>
</body>
</html>
</body>