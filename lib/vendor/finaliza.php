<?php

include("autoload.php");

// Configura credenciais
MercadoPago\SDK::setAccessToken('APP_USR-7768088922376725-080320-ad8ac8ba9a9c6e25daf24d2fc706f750-614375984');

// Cria um objeto de preferência

$quant = $_GET['quant'];

$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Produtos - Farmácia Online';
$item->quantity = 1;
$item->unit_price = $quant;
$preference->items = array($item);
$preference->save();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagamento</title>
	<meta charset="utf-8">
	<script type= "text/javascript" src= "../../jquery-3.4.1.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</head>
<body>
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper #29b6f6 light-blue lighten-1">
      <div class="container">
      <a  class="brand-logo"><img src="../../logo.png" align="center"></a>
      </div>
  </div>
 </nav>
</div>

<h5>Método de pagamento: <i class="material-icons">monetization_on</i></h5>

<div class="row">
    <div class="col s12 m3 push-m2">
      <div class="card">
      	<blockquote><span class="card-title black-text">Pagamento online</span></blockquote>
        <div class="card-image">
          <img src="logo.jpg">
        </div>
        <div class="card-content">
          <p><h6>A forma de pagamento online é pelo mercadopago, ao clicar em pagar, você vai ser redirecionado a uma janela de pagamento onde você vai poder escolher a forma de pagamento via cartão de crédito, boleto, lotérica ou cartão virutal.</h6></p>
        </div>
        <div class="card-action center">
          <form action="/processar_pagamento" method="POST">
  			<script
   				src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
   				data-preference-id="<?php echo $preference->id; ?>">
  			</script>
		  </form>
        </div>
      </div>
    </div>


     <div class="col s12 m3 push-m3">
      <div class="card">
      	<blockquote><span class="card-title black-text">Retirar na loja</span></blockquote>
        <div class="card-image">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3463.526413936881!2d-57.067839785074014!3d-29.762416425176045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94535b6d3bced709%3A0xf95c3965dcdabbdd!2sR.%20Agnaldo%20Tarrago%2C%20158%20-%20Cidade%20Nova%2C%20Uruguaiana%20-%20RS%2C%2097505-010!5e0!3m2!1spt-BR!2sbr!4v1597621510880!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" width="290" height="360" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="card-content">
          <p><h6>Você pode optar por pagar os produtos na loja, porém o pagamento será validado somente após a confirmação da compra na loja física.</h6></p>
        </div>
        <div class="card-action center">
  			<a class="btn-small blue">Pagar</a>
        </div>
      </div>
    </div>
  </div>

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
</style>
</body>
</html>