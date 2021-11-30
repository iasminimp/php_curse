<?php
    include_once './conexao.php';
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - IN</title>
    </head>
    <body>
        <h2>Como usar o IN no MySQLi</h2>
        <?php
            $query_users = "SELECT id, nome, email, niveis_acesso_id "
                    . "FROM users "
                    . "WHERE niveis_acesso_id IN (2,1)";  //IN: se contem X e/ ou x (nesse caso 1 ou 2)
            $result_users = mysqli_query($conn, $query_users);
            
            while($row_user = mysqli_fetch_assoc($result_users)){
                extract ($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Nível de Acesso: $niveis_acesso_id <br>";
                echo "<hr>";
            }
        
            
        ?>
    </body>
</html>
