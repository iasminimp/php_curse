<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - SUM</title>
    </head>
    <body>
        <h2>Quantidade de visualizações</h2>
        <?php
        $id_usuario = 5;
        $query_acessos = "SELECT SUM(qnt_acessos) AS qnt_acessos
                FROM acessos
                WHERE user_id = $id_usuario";
        $result_acessos = mysqli_query($conn, $query_acessos);
        $row_acesso = mysqli_fetch_assoc($result_acessos);
        //var_dump($row_acesso);
        echo "O usuário $id_usuario visualizou: <strong>" . $row_acesso['qnt_acessos'] . "</strong> vezes.<br>";
        ?>
    </body>
</html>
