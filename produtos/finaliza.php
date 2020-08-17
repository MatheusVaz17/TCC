<?php

  include_once '../lib/vendor/autoload.php'; // You have to require the library from your Composer vendor folder
  require '../bd/conexao.php';

  MercadoPago\SDK::setClientId("7768088922376725"); // Either Production or SandBox AccessToken
  MercadoPago\SDK::setClientSecret("EVddGiymfIUTy3QlK0qn0BxSrnfSV46j");

    $preference = new MercadoPago\Preference();
  
  # Building an item

  $produto1 = ['Bola de futebol', 1, 100.7];
  
  $item = new MercadoPago\Item();
  $item->id = "00001";
  $item->title = $produto1[0]; 
  $item->quantity = $produto1[1];
  $item->unit_price = $produto1[2];
  
  $preference->items = array($item);
  
  $preference->save(); # Save the preference and send the HTTP Request to create
  
  # Return the HTML code for button
  
  echo "<a href='$preference->sandbox_init_point'> Pagar </a>";
  
?>