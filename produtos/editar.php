<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
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
        .href='../clientes/entrar.php';</script>";
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
      <div class="container">
      <a href="#!" class="brand-logo"><img src="../logo.png" align="center"></a>
      </div>
      <ul class="right hide-on-med-and-down">
      </ul>
    </div>
  </nav>
</div>


<br>

<div class="container">

<div class="card #e3f2fd blue lighten-5">

  <div class="card-content">
          <blockquote><span class="card-title"><b>Editar Produto</b></span></blockquote>

  <form action="confirmedit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
  
  <div class="col s6">
    <p><b>Tipo do produto: *</b>
    <div style="width: 40%"> 
    <select name="tipo" required>
    <option value="Medicamento">Medicamento</option>
    <option value="Higiene">Higiene</option>
    <option value="Dermocosmeticos">Dermocosméticos</option>
    <option value="Suplementos">Suplementos</option>
    </select>
    </div>
    </p>
    <p><b>Nome: *</b><br> <input value="<?php echo $dados['nome'];  ?>"  type="text" name="nome" style="width: 40%" required></p>
    <p><b>Valor: *</b><br> <input value="<?php echo $dados['valor'];  ?>" type="text" name="valor" style="width: 40%" required min="1"></p>
    <p>
      <b>Disponibilidade: *</b>
      <br>
      <br>
      <label>
        <input name="disponibilidade" id="si" type="radio" value="Disponivel" checked />
        <span style="color: black">Disponível</span>
      </label>
      <label>
        <input id="no" name="disponibilidade" type="radio" value="NoDisponivel" />
        <span style="color: black">Não disponível</span>
      </label>
    </p><br><br>
    <div class="file-field input-field">
      <div class="btn green">
        <span>Foto *</span>
        <input required type="file" value="<?php echo $dados['foto'] ?>" name="arquivo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" style="width: 28%">
      </div>
    </div>
    <p id="qtd"><b>Quantidade: *</b><br> <input type="number" name="qtd" value="1" style="width: 40%" required min="1"></p>

  </div>
  

    <div class="col s6">
    <p><b>Informações sobre o produto: *</b></p>
    <textarea required maxlength="1500" class="materialize-textarea" name="informacao" style="max-width: 70%"><?php echo $dados['informacao'];  ?></textarea>

    <p><b>Indicação:</b></p>
    <textarea maxlength="1500" class="materialize-textarea" name="indicacao" style="max-width: 70%"><?php echo $dados['indicacao'];  ?></textarea>  

    <p align="left"><b>Benefícios:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" name="beneficio" style="max-width: 70%"><?php echo $dados['beneficio'];  ?></textarea>

    <p align="left"><b>Modo de usar:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" name="modo" style="max-width: 70%"><?php echo $dados['modo'];  ?></textarea>

    <p align="left"><b>Recomendações gerais:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" name="recomendacao" style="max-width: 70%"><?php echo $dados['recomendacao'];  ?></textarea>  
  </div>

  </div>

</div>

<div class="card-action">
          <div>
  <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
    <i class="material-icons right">send</i>
  </button>
  <a href="../adm/adm.php" class="btn red">Cancelar
    <i class="material-icons right">close</i>
  </a>
</div>
</div>


</form>
</div>

</div>
</fieldset>

<!-- Footer -->
<footer class="page-footer #29b6f6 light-blue lighten-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Farmácia On-line</h5>
                <p class="grey-text text-lighten-4">Aqui você encontra os melhores produtos pelos melhores preços.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contato</h5>
                <ul>
                  <li><p><h6>Farmacia@farmacia.com</h6></p></li>
                  <li><p><h6>(55)9 84088361</h6></p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 Matheus Vaz Flores
            </div>
          </div>
        </footer>



<style>

.container {
  
margin: 0 auto;
  
max-width: 1280px;
  
width: 80%;

}

@media only screen and (min-width: 601px) {
 
.container {
    
width: 80%;
  
}

}

@media only screen and (min-width: 993px) {
  
.container {
    
width: 80%;
  
}
}

</style>


<?php
}
}
?>

<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();

    $("#no").click(function(){
    $("#qtd").hide();
  });
    $("#si").click(function(){
    $("#qtd").show();
  });
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