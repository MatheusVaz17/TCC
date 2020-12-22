<?php

$login = $_COOKIE['login'];
session_start();
include "../bd/conexao.php";
$idUsuario = $_SESSION['id'];
?>

<div class="container">

<div id="resultado">

<div class="row">
  <div class="col s12">
    <h3 class="light">Carrinho de compras <i class="material-icons">shopping_cart</i></h3>
    <form id="form1" method="post" action=''>
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

$sqlSum = "SELECT SUM(valor), id FROM carrinho WHERE idusuario = $idUsuario";
$resultadoSum = mysqli_query($connect, $sqlSum);
if(mysqli_num_rows($resultadoSum) > 0){
  $dadosSum = mysqli_fetch_array($resultadoSum);
  $idcarrinho = $dadosSum[1];
}

$sqlQuant = "SELECT SUM(produto_carrinho.quantidade)FROM produto_carrinho, carrinho WHERE produto_carrinho.idcarrinho = carrinho.id and carrinho.idusuario = $idUsuario";
$resultadoQuant = mysqli_query($connect, $sqlQuant);
if(mysqli_num_rows($resultadoQuant) > 0){
  $dadosQuant = mysqli_fetch_array($resultadoQuant);
}

?>

<?php
$sql = "SELECT produto.nome, produto.valor, produto_carrinho.quantidade, carrinho.valor, produto_carrinho.id FROM produto, produto_carrinho, carrinho WHERE carrinho.idusuario = $idUsuario and produto_carrinho.idcarrinho = carrinho.id and produto_carrinho.idproduto = produto.id";

$resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado) > 0){ 

          ?>
          
          <p align="center"><a class="waves-effect waves-light btn red z-depth-3"  href="farmacia.php"> <i class="material-icons left">keyboard_arrow_left
</i> Voltar</a> <a class="waves-effect waves-light btn green z-depth-3" href="../apimercadopago/client/index.php?valor=<?php echo $dadosSum[0]; ?>&quant=<?php echo $dadosQuant[0]; ?>">Confirmar compra <i class="material-icons right">check</i></a>
<a class="waves-effect waves-light btn modal-trigger red" href="#modal2" id="btnDelete"><i class="material-icons left">delete</i> Excluir</a>
</p>
          <p align="center">
            <h6 align="center"> Quantidade Total: <?php echo $dadosQuant[0]; ?> </h6>
            <h6 align="center"> Valor Total: R$<?php echo preg_replace('/[^0-9]+/',',',$dadosSum[0]); ?> </h6>
          </p>
          <?php
        while ($dados = mysqli_fetch_array($resultado)){
          $id = $dados['id'];

?>
    <tr>
      <td><?php echo $dados[0]; ?></td>
      <td>R$<?php echo $dados[1]; ?></td>
      <td><?php echo $dados[2]; ?></td>
      <td>R$<?php echo $dados[3]; ?></td>
      <td class="push-m2"><label>
        <input type="checkbox" id="deletar[]" name="deletar[]" value="<?php echo $id; ?>" />
        <span></span>
      </label>
      </td>

<!-- Modal Structure -->

  <div id="modal2" class="modal">
    
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