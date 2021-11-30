<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - COUNT</title>
    </head>
    <body>
        <h2>Listar quantidade de usuários cadastrado no banco de dados utilizando o COUNT</h2>
        <?php
        $query_qnt_users = "SELECT COUNT(id) AS qnt_users
                FROM users
                WHERE sits_user_id = 1";
        $result_qnt_users = mysqli_query($conn, $query_qnt_users);
        $row_qnt_users = mysqli_fetch_assoc($result_qnt_users);
        //var_dump($row_qnt_users);
        echo "Quantidade de usuário: " . $row_qnt_users['qnt_users'] . "<br>";
        ?>
    </body>
</html>
