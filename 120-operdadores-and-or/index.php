<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            include_once './conexao.php';
            
            echo "<h2>Listar usuários com duas condições </h2>";
            $query_users = "SELECT id, nome, email, sits_user_id, niveis_acesso_id FROM users WHERE sits_user_id = 1 AND niveis_acesso_id=3";
            $result_users = mysqli_query($conn, $query_users);
            
            while ($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Situação: $sits_user_id <br>";
                echo "Nível de Acesso: $niveis_acesso_id <br>";
                echo "<hr>";
            }
            
            echo "<hr>";
            echo "<h2>Listar usuários com duas condições (OR) </h2>";
            $query_users = "SELECT id, nome, email, sits_user_id, niveis_acesso_id FROM users WHERE sits_user_id = 1 OR niveis_acesso_id=3";
            $result_users = mysqli_query($conn, $query_users);
            
            while ($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Situação: $sits_user_id <br>";
                echo "Nível de Acesso: $niveis_acesso_id <br>";
                echo "<hr>";
            }
            
            
            echo "<hr>";
            echo "<h2>Listar usuários com duas condições (por string e OR) </h2>";
            $query_users = "SELECT id, nome, email, sits_user_id, niveis_acesso_id FROM users WHERE sits_user_id = 1 OR nome ='Marcos'";
            $result_users = mysqli_query($conn, $query_users);
            
            while ($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Situação: $sits_user_id <br>";
                echo "Nível de Acesso: $niveis_acesso_id <br>";
                echo "<hr>";
            }
            
        ?>
    </body>
</html>
