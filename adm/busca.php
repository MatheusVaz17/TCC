<?php

        require "../bd/conexao.php";

        $email = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

        // Prepara o SQL e Consulta no banco
        $sql = "SELECT * FROM pagamentos WHERE email LIKE '%$email%' LIMIT 5";
        $resultado = mysqli_query($connect, $sql);
        
        
        if (mysqli_num_rows($resultado) > 0) {
            ?>
            <thead>
                <tr>
                <th>Cliente:</th>
                <th>Produtos:</th>
                <th>Quantidade:</th>
                <th>Valor:</th>
                <th>Data da compra:</th>
                <th>Situação:</th>
                </tr>
                </thead>
                <?php
            while ($dados = mysqli_fetch_array($resultado)) {
                ?>
                <tbody>
                <tr>
                  <td><?php echo $dados['email']; ?></td>
                  <td><?php echo $dados['produtos']; ?></td>
                  <td><?php echo $dados['quantidade']; ?></td>
                  <td>R$<?php echo $dados['valor']; ?></td>
                  <td><?php echo $dados['data']; ?></td>
                  <td><?php echo $dados['pedido']; ?></td>
                </tbody>
                </tr>

                <?php
            }
        }else{  
            echo "Nenhum resultado encontrado!";
        }
?>