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
  <form action="confirmedit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <fieldset style="border-color: #29b6f6; border-radius: 8px"> <legend style="text-align: center"><h6>Adicionar Produto</h6></legend>
  <div class="col s6">
    <p>Tipo do produto:
    <div style="width: 40%"> 
    <select name="tipo" required>
    <option value="Medicamento">Medicamento</option>
    <option value="Higiene">Higiene</option>
    <option value="Dermocosmeticos">Dermocosméticos</option>
    <option value="Alimentos">Alimentos</option>
    </select>
    </div>
    </p>
    <p>Nome: <br> <input value="<?php echo $dados['nome'];  ?>"  type="text" name="nome" style="width: 40%" required></p>
    <p>Valor: <br> <input value="<?php echo $dados['valor'];  ?>" type="text" name="valor" style="width: 40%" required min="1"></p>
    <p>Disponibilidade:
    <div style="width: 40%">
    <select name="disponibilidade" required>
    <option value="Disponivel">Disponivel</option>
    <option value="Não Disponivel">Não disponível</option>
    </select> </div></p><br>
    <p>Foto: <input required type="file" name="arquivo"></p>
    <div>
  <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
    <i class="material-icons right">send</i>
  </button>
  <a href="../adm/adm.php" class="btn red">Cancelar
    <i class="material-icons right">close</i>
  </a>
</div>
  </div>
  

    <div class="col s6">
    <p><b>Informações sobre o produto:</b></p>
    <textarea required maxlength="500" name="informacao" style="max-width: 70%"><?php echo $dados['informacao'];  ?></textarea>

    <p><b>Indicação:</b></p>
    <textarea required maxlength="500" name="indicacao" style="max-width: 70%"><?php echo $dados['indicacao'];  ?></textarea>  

    <p align="left"><b>Benefícios:</b></p>
    <textarea required maxlength="500" name="beneficio" style="max-width: 70%"><?php echo $dados['beneficio'];  ?></textarea>

    <p align="left"><b>Modo de usar:</b></p>
    <textarea required maxlength="500" name="modo" style="max-width: 70%"><?php echo $dados['modo'];  ?></textarea>

    <p align="left"><b>Recomendações gerais:</b></p>
    <textarea required maxlength="500" name="recomendacao" style="max-width: 70%"><?php echo $dados['recomendacao'];  ?></textarea>  
  </div>
  </fieldset>
  </div>

</div>

</form>
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