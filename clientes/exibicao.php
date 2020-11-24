<?php

$login = $_COOKIE['login'];
session_start();
include "../bd/conexao.php";
$logado = $_SESSION['email'];
?>

<div class="container">

<div id="resultado">

<div class="row">
  <div class="col s12">
    <h3 class="light">Carrinho de compras <i class="material-icons">shopping_cart</i></h3>
    <form id="form1" method="post" action="deletarCarrinho.php">
    <table class="striped">
      <thead>
        
        <tr>
          <th>Nome:</th>
          <th>Preço Unitário:</th>
          <th>Quantidade:</th>
          <th>Valor Geral:</th>
          <th>Excluir produto:</th>
        </tr>
      </thead>
      
      <tbody>


<?php

$sqlSum = "SELECT SUM(valor) FROM carrinho WHERE email = '$logado'";
$resultadoSum = mysqli_query($connect, $sqlSum);
if(mysqli_num_rows($resultadoSum) > 0){
  $dadosSum = mysqli_fetch_array($resultadoSum);
}

$sqlQuant = "SELECT SUM(quantidade) FROM carrinho WHERE email = '$logado'";
$resultadoQuant = mysqli_query($connect, $sqlQuant);
if(mysqli_num_rows($resultadoQuant) > 0){
  $dadosQuant = mysqli_fetch_array($resultadoQuant);
}

?>

<?php
$sql = "SELECT * FROM carrinho WHERE email = '$logado'";
$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 

          ?>
          
          <p align="center"><a class="waves-effect waves-light btn red z-depth-3"  href="farmacia.php"> <i class="material-icons left">keyboard_arrow_left
</i> Voltar</a> <a class="waves-effect waves-light btn green z-depth-3" href="../apimercadopago/client/index.php?valor=<?php echo $dadosSum[0]; ?>&quant=<?php echo $dadosQuant[0]; ?>">Confirmar compra <i class="material-icons right">check</i></a>
<a class="waves-effect waves-light btn modal-trigger red" href="#modal1" id="btnDelete"><i class="material-icons left">delete</i> Excluir</a>
</p>
          <p align="center">
            <h6 align="center"> Quantidade Total: <?php echo $dadosQuant[0]; ?> </h6>
            <h6 align="center"> Valor Total: R$<?php echo $dadosSum[0]; ?> </h6>
          </p>
          <?php
        while ($dados = mysqli_fetch_array($resultado)){
          $id = $dados['id'];

?>
    <tr>
      <td><?php echo $dados['nome']; ?></td>
      <td>R$<?php echo $dados['preco']; ?></td>
      <td><?php echo $dados['quantidade']; ?></td>
      <td>R$<?php echo $dados['valor']; ?></td>
      <td class="push-m2"><label>
        <input type="checkbox" id="deletar[]" name="deletar[]" value="<?php echo $id; ?>" />
        <span></span>
      </label>
      </td>

<!-- Modal Structure -->

  <div id="modal1" class="modal">
    
    <div class="modal-content">
      <h4>Excluir produto</h4>
      <p>Você tem certeza que deseja excluir os produtos selecionados?</p>
    </div>
    <div class="modal-footer">
      <a href="" class="modal-close waves-effect waves-green btn-flat blue" style="color: white">Cancelar</a>
      <button type="submit" class="modal-close waves-effect waves-green btn-flat red white-text">Excluir</button> 
    </div>
    
  </div>

    </tr>
  </tbody>

<?php
}
}else{
?>
<tr>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
<?php
}
?>
</table>
</form>
</div>
</div>

</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('.modal').modal();




  });


</script>
</div>