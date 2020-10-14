<?php

        require "../bd/conexao.php";

        $nome = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

        // Prepara o SQL e Consulta no banco
        $sql = "SELECT * FROM produto WHERE nome LIKE '%$nome%' LIMIT 5";
        $resultado = mysqli_query($connect, $sql);
        
        
        if (mysqli_num_rows($resultado) > 0) {
            while ($dados = mysqli_fetch_array($resultado)) {
                ?>
               <a  href="addprodutos.php?id=<?php echo $dados['id']; ?>&comprar=1"> <li style=" margin: 0 20%;" class="black-text"> <?php echo $dados['nome']; ?><i class="material-icons right green-text"> arrow_forward</i></li></a>

                 
                 <br>
                <?php
            }
        }else{  
            echo "Nenhum resultado encontrado!";
        }
?>