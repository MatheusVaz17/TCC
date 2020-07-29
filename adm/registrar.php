<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link rel="icon" type="image/jpg" href="icon.jpg">
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
  unset($_SESSION['check']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";
  }
?>

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
          <blockquote><span class="card-title"><b>Adicionar produto</b></span></blockquote>
  <form action="inserir.php" method="post" enctype="multipart/form-data">
  <div class="row">
    


  <div class="col s6">
    <p><b>Tipo do produto: </b>
    <div style="width: 40%"> 
    <select name="tipo" required>
    <option value="Medicamento">Medicamento</option>
    <option value="Higiene">Higiene</option>
    <option value="Dermocosmeticos">Dermocosméticos</option>
    <option value="Suplementos">Suplementos</option>
    </select>
    </div>
    </p>
    <p><b>Nome: </b><br> <input type="text" name="nome" style="width: 40%" required></p>
    <p><b>Valor: </b><br> <input type="text" name="valor" style="width: 40%" required min="1"></p>
    <p><b>Disponibilidade: </b>
    <div style="width: 40%">
    <select name="disponibilidade" required>
    <option value="Disponivel">Disponivel</option>
    <option value="Não Disponivel">Não disponível</option>
    </select> </div></p><br>
    <div class="file-field input-field">
      <div class="btn green">
        <span>Foto</span>
        <input type="file" name="arquivo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" style="width: 28%">
      </div>
    </div>
  </div>
  

    <div class="col s6">
    <p><b>Informações sobre o produto:</b></p>
    <textarea required maxlength="500" name="informacao" class="materialize-textarea" style="max-width: 70%"></textarea>

    <p><b>Indicação:</b></p>
    <textarea required maxlength="500" class="materialize-textarea" name="indicacao" style="max-width: 70%"></textarea>  

    <p align="left"><b>Benefícios:</b></p>
    <textarea required maxlength="500" class="materialize-textarea" name="beneficio" style="max-width: 70%"></textarea>

    <p align="left"><b>Modo de usar:</b></p>
    <textarea required maxlength="500" class="materialize-textarea" name="modo" style="max-width: 70%"></textarea>

    <p align="left"><b>Recomendações gerais:</b></p>
    <textarea required maxlength="500" class="materialize-textarea" name="recomendacao" style="max-width: 70%"></textarea>  
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

<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>


</style>
</body>
</html>