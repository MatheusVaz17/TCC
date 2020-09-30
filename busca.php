<?php

        require "bd/conexao.php";

        $nome = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

        // Prepara o SQL e Consulta no banco
        $sql = "SELECT * FROM produto WHERE nome LIKE '%$nome%' LIMIT 5";
        $resultado = mysqli_query($connect, $sql);
        
        
        if (mysqli_num_rows($resultado) > 0) {
            while ($dados = mysqli_fetch_array($resultado)) {
                ?>
                <li style=" margin: 0 20%;"> <?php echo $dados['nome']; ?> <a class="btn-floating green white-text" href="clientes/addprodutos.php?id=<?php echo $dados['id']; ?>&comprar=0"><i class="material-icons">arrow_forward</i></a> </li><br>
                <?php
            }
        }else{  
            echo "Nenhum resultado encontrado!";
        }
?>