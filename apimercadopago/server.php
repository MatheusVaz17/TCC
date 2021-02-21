<head>
    <title>Pagamento</title>
    <meta charset="utf-8">
    <script src="../jquery-3.4.1.js"></script>
    <script src="../materialize/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <script type="text/javascript" src="js/index.js" defer></script>
    <link rel="icon" href="../fav.png" />
  </head>
<body>


<?php

require __DIR__  . '/vendor/autoload.php';

//Cole seu ACESS TOKEN de: https://developers.mercadopago.com/panel/credentials

 /*
 O Acess Token se consegue no site do mercadopago, precisa dela para poder utilizar a api do mercadopago 
 */
MercadoPago\SDK::setAccessToken("");


session_start();
include "../bd/conexao.php";
$idUsuario = $_SESSION['id'];

if (!isset($idUsuario)) {
      echo "<script> alert('Você precisa estar logado para acessar essa página'); window.location.href='../index.php'; </script>";
    }





$path = $_SERVER['REQUEST_URI'];

        $payment = new MercadoPago\Payment();
        $payment->transaction_amount = (float)$_POST['transactionAmount'];
        $payment->token = $_POST['token'];
        $payment->description = $_POST['description'];
        $payment->installments = (int)$_POST['installments'];
        if (empty($payment->installments)) {
            echo "<script> alert('Erro ao realizar pagamento, por favor verifique os dígitos do seu cartão, lembre-se que não pode haver espaçamento no número do cartão!'); window.location.href='../clientes/carrinho.php'; </script>";
        }
        $payment->payment_method_id = $_POST['paymentMethodId'];
        //$payment->issuer_id = 29883434;

        $payer = new MercadoPago\Payer();
        $payer->email = $_POST['email'];
        $payer->identification = array( 
            "type" => $_POST['docType'],
            "number" => $_POST['docNumber']
        );
        $payment->payer = $payer;

        $payment->save(); 

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );

        if ($payment->status == 'approved') {

            $sql = "SELECT DISTINCT produto.nome FROM produto, carrinho, produto_carrinho WHERE carrinho.id = produto_carrinho.idcarrinho AND carrinho.idusuario = '$idUsuario' AND produto_carrinho.idproduto = produto.id";
            $result = mysqli_query($connect, $sql);

            $i = 0;

            $num = mysqli_num_rows($result);

            while($i < $num){
            while($dados = mysqli_fetch_array($result)){
                $array[$i] = $dados[0];
                $i++;
            }
            }

            

            $string = implode(", ", $array);

            $sqlQuant = "SELECT SUM(produto_carrinho.quantidade)FROM produto_carrinho, carrinho WHERE produto_carrinho.idcarrinho = carrinho.id and carrinho.idusuario = $idUsuario";
            $resultadoQuant = mysqli_query($connect, $sqlQuant);
            if(mysqli_num_rows($resultadoQuant) > 0){
              $dadosQuant = mysqli_fetch_array($resultadoQuant);
            }

            $sqlValor = "SELECT SUM(valor) FROM carrinho WHERE idusuario = $idUsuario";
            $resultadoValor = mysqli_query($connect, $sqlValor);
            if(mysqli_num_rows($resultadoValor) > 0){
              $dadosValor = mysqli_fetch_array($resultadoValor);
            }

            $deletetrue = "SET foreign_key_checks = 0";
            mysqli_query($connect, $deletetrue);

            $delete = "DELETE produto_carrinho, carrinho FROM carrinho INNER JOIN produto_carrinho ON produto_carrinho.idcarrinho = carrinho.id and carrinho.idusuario = $idUsuario";
            $deletar = mysqli_query($connect, $delete);

            date_default_timezone_set("America/Sao_Paulo");
            $data = date("d/m/Y H:i");

            $sql2 = "INSERT INTO pagamentos(idusuario, pedido, data, produtos) VALUES ($idUsuario, 'A encaminhar produto', '$data', '$string')";
            $resultado2 = mysqli_query($connect, $sql2);

            $sql5 = "SELECT id from pagamentos where idusuario = $idUsuario ORDER BY id DESC limit 1";
            $resultado5 = mysqli_query($connect, $sql5);
            $dados5 = mysqli_fetch_array($resultado5);
            $idpagamento = $dados5[0];


            $sql4 = "INSERT INTO produto_pedido(idpagamento, valor, quantidade) VALUES ($idpagamento, $dadosValor[0], $dadosQuant[0])";
            $resultado4 = mysqli_query($connect, $sql4);

            if ($resultado2 and $resultado4) {
            ?>
            <!-- Modal Structure -->
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>Status da compra</h4>
                  <p>Sua compra foi aprovada!</p>
                </div>
                <div class="modal-footer">
                  <a href="../clientes/farmacia.php" class="modal-close waves-effect waves-green btn-flat green white-text">Ok</a>
                </div>
              </div>
            <?php
            $deletefalse = "SET foreign_key_checks = 1";
            mysqli_query($connect, $deletefalse);
            }
            
        }else{
        ?>
        <!-- Modal Structure -->
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4>Status da compra</h4>
                  <p>Sua compra não foi aprovada!</p>
                </div>
                <div class="modal-footer">
                  <a href="../clientes/farmacia.php" class="modal-close waves-effect waves-green btn-flat red white-text">Ok</a>
                </div>
              </div>
        <?php
        }

        
    //Serve static resources
?>
<script type="text/javascript">
    $(document).ready(function(){
      $('.modal').modal();
      $('#modal1').modal('open');
 });
</script>
</body>

