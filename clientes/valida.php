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
<script type="text/javascript">
  $(document).ready(function(){
  $('.modal').modal();
    $('.modal').modal('open');
  });
</script>
</head>
<body>
<?php
require "../bd/conexao.php";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$celular = $_POST['celular'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];
$cep = $_POST['cep'];
$dataNasc = $_POST['data'];


if (isset($_FILES['foto'])) {
$extensao = strtolower(substr($_FILES['foto']['name'], -4));
if ($extensao) {
  $novo_nome = md5(time()).$extensao;
  $diretorio = "../fotos/clientes/";

  move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
}else{
  $novo_nome = 'empty';
}
  
}

$numcasa = $_POST['numcasa'];
$endereco = $_POST['endereco'];


$query_select = "SELECT email,cpf FROM usuarios WHERE email = '$email' or cpf = '$cpf'";
$select = mysqli_query($connect, $query_select);
$dados = mysqli_fetch_array($select);
if(mysqli_num_rows($select) > 0){
 
        ?>

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de usuário</h4>
      <p>Esse usuário já existe, por favor verique suas informações de email e cpf!</p>
    </div>
    <div class="modal-footer" style="color: white">
        <a href="cadastro.php" class="modal-close waves-effect waves-green btn red">Confirmar</a>
    </div>
  </div>

  <?php
        die;
    }else{
        $query = "INSERT INTO usuarios (nome,sobrenome,email,cpf,celular,senha,sexo,cep,dataNascimento, foto, numcasa, endereco) VALUES ('$nome','$sobrenome','$email','$cpf','$celular','$senha','$sexo','$cep','$dataNasc', '$novo_nome', '$numcasa', '$endereco')";
        $insert = mysqli_query($connect,$query);

    if($insert){
      ?>
<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de usuário</h4>
      <p>Usuário cadastrado com sucesso!</p>
    </div>
    <div class="modal-footer" style="color: white">
        <a href="entrar.php" class="modal-close waves-effect waves-green btn green">Confirmar</a>
    </div>
  </div>
  <?php
        }else{
        ?>

<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Cadastro de usuário</h4>
      <p>Erro ao cadastrar usuário!</p>
    </div>
    <div class="modal-footer" style="color: white">
        <a href="cadastro.php" class="modal-close waves-effect waves-green btn red">Confirmar</a>
    </div>
  </div>
  <?php
        }
    }
?>

</body>
</html>