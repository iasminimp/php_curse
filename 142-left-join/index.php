<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - LEFT JOIN</title>
    </head>
    <body>
        <h2>LEFT JOIN - Recuperar registro de duas tabelas</h2>

        <?php
        $query_users = "SELECT usr.id, usr.nome, usr.email,
            sit.id id_sit, sit.nome AS nome_sit,
            niv.id id_niv, niv.nome AS nome_niv
            FROM users AS usr
            LEFT JOIN sits_users AS sit ON sit.id = usr.sits_user_id
            LEFT JOIN niveis_acessos AS niv ON niv.id = usr.niveis_acesso_id
            ORDER BY usr.id DESC";
        $result_users = mysqli_query($conn, $query_users);

        while ($row_user = mysqli_fetch_assoc($result_users)) {
            extract($row_user);
            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "E-mail: $email <br>";
            echo "ID da Situação do Usuário: $id_sit <br>";
            echo "Situação do Usuário: $nome_sit <br>";
            echo "ID do Nível de Acesso do Usuário: $id_niv <br>";
            echo "Nível de Acesso do Usuário: $nome_niv <br>";
            echo "<hr>";
        }
        ?>
    </body>
</html>
