<?php
include "bd/conexao.php";

if (isset($_POST['action'])) {
	$tipo = $_POST['tipo'];
	$nome = $_POST['nome'];
	$valor = $_POST['valor'];
	$disponibilidade = $_POST['disponibilidade'];

	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
	$novo_nome = md5(time()).$extensao;
	$diretorio = "fotos/";

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

	$sql = "INSERT INTO produto (tipo, nome, valor, disponibilidade, foto) VALUES ('$tipo','$nome', $valor, '$disponibilidade', '$novo_nome')";

    if (mysqli_query($connect,$sql)):
    echo "<script> alert('Produto cadastrado com sucesso!'); window.location.href='index.php'; </script>";
    else:
	echo "<script> alert('Falha ao cadastrar!'); window.location.href='registrar.html'; </script>";
 endif;

}
?>