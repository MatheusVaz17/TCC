<!DOCTYPE html>
<html>
<head>
	<title>Farmácia</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../jquery-3.4.1.js"></script>
<script type= "text/javascript" src= "../jquery.mask.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#">
    <img src="iconus.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Novo Usuário
  </a>
</nav>


  <form method="post" action="valida.php">

  <div class="col-12 text-center my-5">

  <div class="form-row align-items-center">
    <div class="col-md-4 mb-3">
      <label>Nome*</label>
      <input type="text" class="form-control" name="nome" maxlength="30" placeholder="Digite aqui seu nome" required>
    </div>
    <div class="col-md-4 mb-3">
      <label>Ultimo sobrenome*</label>
      <input type="text" class="form-control" maxlength="30" name="sobrenome" placeholder="Digite aqui seu sobrenome" required>
    </div>
    <div class="col-md-4 mb-3">
      <label>Email*</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">@</span>
        </div>
        <input type="text" class="form-control" maxlength="50" aria-describedby="inputGroupPrepend2" name="email" placeholder="exemplo@email.com" required>
      </div>
    </div>
  </div>

  <div class="form-row align-items-center">
    <div class="col-md-4 mb-3">
      <label>CPF*</label>
      <input type="text" class="form-control" maxlength="14" id="cpf" name="cpf" placeholder="000.000.000-00" required>
    </div>
    <div class="col-md-4 mb-3">
      <label>Celular*</label>
      <input type="tel" class="form-control" maxlength="15" name="celular" id="celular" placeholder="(DD) + Número do celular" required>
    </div>
    <div class="col-md-4 mb-3">
    <label for="exampleInputPassword1">Senha*</label>
    <input type="password" class="form-control" id="exampleInputPassword1" maxlength="50" name="senha" placeholder="Digite aqui sua senha" required>
    </div>
  </div>

  <div class="form-row align-items-center">
    <div class="col-md-4 mb-3">
      <label for="exampleFormControlSelect1">Sexo*</label>
    <select class="form-control" id="exampleFormControlSelect1" name="sexo" required>
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select>
    </div>
    <div class="col-md-4 mb-3">
      <label>CEP*</label>
      <input type="text" class="form-control" maxlength="9" id="cep" name="cep" placeholder="00000-000" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="exampleFormControlSelect1">Data de Nascimento*</label>
      <input type="date" name="data" required>
    </div>
  </div>

<button type="submit" class="btn btn-primary">Cadastrar</button>
  <a href="../index.php" class="btn btn-danger">Cancelar</button>
  </a>
  
</form>

<script type="text/javascript">
  $("#cpf").mask("000.000.000-00");
  $("#celular").mask("(00) 00000-0000");
  $("#cep").mask("00000-000");
</script>
</body>
</html>