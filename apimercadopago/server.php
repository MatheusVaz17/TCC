<?php

require __DIR__  . '/vendor/autoload.php';

//REPLACE WITH YOUR ACCESS TOKEN AVAILABLE IN: https://developers.mercadopago.com/panel/credentials
MercadoPago\SDK::setAccessToken("TEST-7768088922376725-080320-10c0a472c87d5c5761573e7b1a2455d0-614375984");


session_start();
include "../bd/conexao.php";
$logado = $_SESSION['email'];

if (!isset($logado)) {
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

            $sql = "SELECT nome FROM carrinho WHERE email = '$logado'";
            $result = mysqli_query($connect, $sql);

            $i = 0;

            $num = mysqli_num_rows($result);

            while($i < $num){
            while($dados = mysqli_fetch_array($result)){
                $array[$i] = $dados['nome'];
                $i++;
            }
            }

            

            $string = implode(", ", $array);

            $sqlQuant = "SELECT SUM(quantidade) FROM carrinho WHERE email = '$logado'";
            $resultadoQuant = mysqli_query($connect, $sqlQuant);
            if(mysqli_num_rows($resultadoQuant) > 0){
              $dadosQuant = mysqli_fetch_array($resultadoQuant);
            }

            $delete = "DELETE FROM carrinho WHERE email = '$logado'";
            $deletar = mysqli_query($connect, $delete);

            $sql2 = "INSERT INTO pagamentos(email, pedido, status, produtos, quantidade) VALUES ('$logado', 'A encaminhar produto', 'Aprovado', '$string', $dadosQuant[0]) ";
            $resultado2 = mysqli_query($connect, $sql2);

            if ($resultado2) {
                echo "<script> alert('Pagamento efetuado com sucesso!'); window.location.href='../clientes/farmacia.php'; </script>";
            }
            
        }

        echo json_encode($response);
        
    //Serve static resources
    

