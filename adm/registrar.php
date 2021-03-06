<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<link rel="icon" href="../fav.png" />
</head>
<body>

<?php
session_start();
if((!isset ($_SESSION['id']) == true) or $_SESSION['id'] != 1)
{
  unset($_SESSION['id']);
  echo"<script> alert('Você precisa estar logado como administrador para acessar essa página!');window.location
        .href='../clientes/entrar.php';</script>";

  }

include("../bd/conexao.php");

$sql = "SELECT nome FROM tipo";
$resultado = mysqli_query($connect, $sql);

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
    


  <div class="col s4">

    <div id="tipo">
    <p><b>Tipo do produto: *</b></p>
    <select name="tipo">
        
        <?php
          while ($dados = mysqli_fetch_array($resultado)) {
          ?>
          <option value="<?php echo $dados['nome']; ?>"><?php echo $dados['nome']; ?></option>
          <?php
          }
        ?>

    </select>
    </p>
    </div>

    <p>
       <label>
        <input id="check" onclick="esconde()" type="checkbox" />
        <span style="color: black">Outro? Qual?</span>
      </label>
    </p>

    <p>
      <div id="outro">
        <input type="text" placeholder="Digite aqui o tipo do produto" name="outro">
      </div>
    </p>

    <p><b>Nome: * </b><br> <input maxlength="23" placeholder="Digite aqui o nome do produto" type="text" name="nome" required></p>
    <p><b>Valor: *</b><br> <input placeholder="Digite aqui o valor do produto" type="text" name="valor"  required min="1"></p>
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
    </p><br>
    <div class="file-field input-field">
      <div class="btn green">
        <span>Foto *</span>
        <input type="file" required name="arquivo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" >
      </div>
    </div>
    <p id="qtd"><b>Quantidade: *</b><br> <input type="number" name="qtd" value="1" required min="1"></p>
  </div>
  

    <div class="col s4">
    <p><b>Informações sobre o produto: *</b></p>
    <textarea required maxlength="1500" name="informacao" id="editor" class="materialize-textarea" style="max-width: 70%"></textarea>

    <p><b>Indicação:</b></p>
    <textarea maxlength="1500" class="materialize-textarea" id="editor2" name="indicacao" style="max-width: 70%"></textarea>  

    <p align="left"><b>Benefícios:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" id="editor3" name="beneficio" style="max-width: 70%"></textarea>
    </div> 
    <div class="col s4">
    <p align="left"><b>Modo de usar:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" id="editor4" name="modo" style="max-width: 70%"></textarea>

    <p align="left"><b>Recomendações gerais:</b></p>
    <textarea  maxlength="1500" class="materialize-textarea" id="editor5" name="recomendacao" style="max-width: 70%"></textarea>

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

    $("#no").click(function(){
    $("#qtd").hide();
  });
    $("#si").click(function(){
    $("#qtd").show();
  });
    


  });

  CKEDITOR.replace('editor');
  CKEDITOR.replace('editor2');
  CKEDITOR.replace('editor3');
  CKEDITOR.replace('editor4');
  CKEDITOR.replace('editor5');

 $("#outro").hide();

function esconde(){
  if($("#check").is(":checked")) {
    $("#tipo").hide();
    $("#outro").show();
    }else{
    $("#tipo").show();
    $("#outro").hide();
    }
}

</script>


</style>
</body>
</html>