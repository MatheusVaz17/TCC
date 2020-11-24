<!DOCTYPE html>
<html>
  <head>
    <title>Template Code - Transparent Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script type="text/javascript" src="js/index.js" defer></script>
  </head>
  <body>
    <?php
    $valor = $_GET['valor'];
    $quant = $_GET['quant'];
    ?>
    <main>
      <!-- Shopping Cart -->
      <section class="shopping-cart dark">
        <div class="container" id="container">
          <div class="block-heading">
            <h2>Confirmação de compra</h2>
            <p>Esse sitema possui uma API integrada ao Mercado Pago para realização de pagamento</p>
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-12 col-lg-8">
                <div class="items">
                  <div class="product">
                    <div class="info">
                      <div class="product-details">
                        <div class="row justify-content-md-center">
                          <div class="col-md-3">
                            <img class="img-fluid mx-auto d-block image" width="400" height="539" src="img/logo.png">
                          </div>
                          <div class="col-md-4 product-detail">
                            <h5>Informações sobre a compra:</h5>
                            <div class="product-info">
                              <p>
                              <b>Quantidade de produtos: <?php echo "$quant"; ?></b><br>
                              
                              <b>Preço total:</b> R$ <span id="unit-price"><?php echo "$valor"; ?></span></p>
                            </div>
                          </div>
                          
                            <input type="hidden" id="quantity" value="<?php echo $quant; ?>">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="summary">
                  <h3>Carrinho de compras</h3>
                  <div class="summary-item"><span class="text">Total</span><span class="price" id="cart-total"></span></div>
                  <button class="btn btn-primary btn-lg btn-block" id="checkout-btn">Pagar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Payment -->
      <section class="payment-form dark">
        <div class="container_payment">
          <div class="block-heading">
            <h2>Formulário de pagamento</h2>
            <p>Preencha as informações necessárias para realizar o pagamento</p>
          </div>
          <div class="form-payment">
            
            <div class="payment-details">
              <form action="/process_payment" method="post" id="paymentForm">
                  <h3 class="title">Informações para a compra</h3>
                  <div class="row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input id="email" placeholder="exemplo@gmail.com" name="email" type="text" class="form-control"></select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-5">
                      <label for="docType">Tipo de documento</label>
                      <select id="docType" name="docType" data-checkout="docType" type="text" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-7">
                      <label for="docNumber">Número de documento</label>
                      <input id="docNumber" placeholder="Sem pontuação" name="docNumber" data-checkout="docNumber" type="text" class="form-control"/>
                    </div>
                  </div>
                  <br>
                  <h3 class="title">Informações do cartão</h3>
                  <div class="row">
                    <div class="form-group col-sm-8">
                      <label for="cardholderName">Título do cartão</label>
                      <input id="cardholderName" data-checkout="cardholderName" type="text" class="form-control">
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="">Data de vencimento</label>
                      <div class="input-group expiration-date">
                        <input type="text" class="form-control" placeholder="MM" id="cardExpirationMonth" data-checkout="cardExpirationMonth"
                          onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                        <span class="date-separator">/</span>
                        <input type="text" class="form-control" placeholder="AA" id="cardExpirationYear" data-checkout="cardExpirationYear"
                          onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                      </div>
                    </div>
                    <div class="form-group col-sm-8">
                      <label for="cardNumber">Número do cartão</label>
                      <input type="text" class="form-control input-background" id="cardNumber" data-checkout="cardNumber"
                        onselectstart="return false"  onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="securityCode">Código de segurança</label>
                      <input id="securityCode" data-checkout="securityCode" type="text" class="form-control"
                        onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                    </div>
                    <div id="issuerInput" class="form-group col-sm-12 hidden">
                      <label for="issuer">Issuer</label>
                      <select id="issuer" name="issuer" data-checkout="issuer" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-12">
                      <label for="installments">Parcelas</label>
                      <select type="text" id="installments" name="installments" class="form-control"></select>
                    </div>
                    <div class="form-group col-sm-12">
                      <input type="hidden" name="transactionAmount" id="amount" value="10" />
                      <input type="hidden" name="paymentMethodId" id="paymentMethodId" />
                      <input type="hidden" name="description" id="description" />
                      <br>
                      <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
                      <br>
                      <a id="go-back">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10 10" class="chevron-left">
                          <path fill="#009EE3" fill-rule="nonzero"id="chevron_left" d="M7.05 1.4L6.2.552 1.756 4.997l4.449 4.448.849-.848-3.6-3.6z"></path>
                        </svg>
                        Voltar
                      </a>
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="footer_logo"><img id="horizontal_logo" src="img/horizontal_logo.png"></div>
      <div class="footer_text">
        <p>Developers Site:</p>
        <p><a href="https://developers.mercadopago.com">https://developers.mercadopago.com</p>
      </div>
		</footer>

    <script type="text/javascript">
      let amount = <?php echo $valor; ?>;
      document.getElementById('summary-total').innerHTML = '$ ' + amount;
    </script>

  </body>
</html>