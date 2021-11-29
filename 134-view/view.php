<?php
    session_start();
    include_once'./conexao.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    
?>




<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Visualizar Usuário</title>
    </head>
    <body>
        <h2>Visualizar Usuários</h2>
        <a href="index.php">Listar</a><br><br>
        <?php
        $query_user = "SELECT id, nome, email, sits_user_id, niveis_acesso_id, created, modified FROM users WHERE id=$id LIMIT 1";
        $result_user = mysqli_query($conn, $query_user);
        $row_user = mysqli_fetch_assoc($result_user);
        extract($row_user);
        
        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Situação do Usuário: $sits_user_id <br>";
        echo "Nível de Acesso: $niveis_acesso_id <br>";
        echo "Cadastro: ".date('d/m/Y H:i:s', strtotime($created))."<br>";
        if(!empty($modified)){
            echo "Editado: ".date('d/m/Y H:i:s',strtotime($modified))."<br>";
        }else{
            echo "Editado: <br>";
        }
        
        ?>
    </body>
</html>
