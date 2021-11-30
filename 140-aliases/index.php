<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>IASMIN - ALIASES</title>
    </head>
    <body>
        <h2>Como usar apelido para tabela e coluna</h2>

        <?php
        //usr - atalho - apelido = users
        $query_users = "SELECT usr.id AS id_usr, usr.nome AS nome_usr, usr.email AS email_usr, usr.created
                FROM users AS usr
                ORDER BY usr.id DESC
                LIMIT 10";
        $result_users = mysqli_query($conn, $query_users);
        
        while( $row_user = mysqli_fetch_assoc($result_users)){
            extract($row_user);
            echo "ID: $id_usr <br>";
            echo "Nome: $nome_usr <br>";
            echo "E-mail: $email_usr <br>";
            echo "Data de Cadastrado: " . date("d/m/Y H:i:s", strtotime($created)) . "<br>";
            echo "<hr>";
        }
        ?>
    </body>
</html>
