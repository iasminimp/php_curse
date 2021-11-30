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
        <title>Iasmin - Between</title>
    </head>
    <body>
        <h2>Como Usar Between no MySQLi</h2>
        <?php
            $query_users = "SELECT id, nome, email FROM users WHERE id BETWEEN 5 AND 9";
            $result_users = mysqli_query($conn, $query_users);
            
            while($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "<hr>";
                
            }
        ?>
    </body>
</html>
