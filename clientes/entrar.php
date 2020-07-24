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
</head>
<body>
<!-- Navbar -->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a href="../index.php" class="brand-logo"><img src="../logo.png" align="center"></a>
      </div>
    </div>
  </nav>
</div>

 <div class="row">
    <div class="col s12 m6 pull-m3 push-m3">
      <div class="card #29b6f6 light-blue lighten-1">
        
        <div class="card-content white-text">
          
          <form method="POST" action="login.php">

          <span class="card-title">Login</span>
          
          <div class="input-field col s12">
          <p>Email: <input id="usuario" type="text" placeholder="Digite seu email" class="validate" name="email" style="background-color: white" required></p>
          </div>
          <div class="input-field col s12">
          <p>Senha: <input id="password" placeholder="Digite sua senha" type="password" class="validate" name="senha" style="background-color: white" required></p>
          <p><label>
          <input type="checkbox" name="check" class="filled-in"/>
          <span style="color: white">Mantenha-me conectado</span>
          </label></p>
          </div>
          
          <button class="btn waves-effect waves-light" type="submit" name="sub">Entrar
          <i class="material-icons right">send</i>
          </button>
          <a href="cadastro.php" class="btn #e53935 red darken-1">Cadastre-se<i class="material-icons right">add</i></a>

          </form>
        </div>
      </div>
      
    </div>
  </div>



  <style type="text/css">
  .container {
  
margin: 0 auto;
  
max-width: 1280px;
  
width: 95%;

}

@media only screen and (min-width: 601px) {
 
.container {
    
width: 95%;
  
}

}

@media only screen and (min-width: 993px) {
  
.container {
    
width: 95%;
  
}
}

  
    body{
      background-image: url("bg.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
    }
    #usuario{
      background-image: url("iconus.png");
      background-repeat: no-repeat;
      background-size: 10%;
      background-position: right;
    }
    #password{
      background-image: url("iconese.jpg");
      background-repeat: no-repeat;
      background-size: 10%;
      background-position: right;
    }
  </style>
</body>
</html>
