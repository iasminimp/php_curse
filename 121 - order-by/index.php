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
         include_once './conexao.php'; #Conectando com o bd
         echo "<br>";
         #comando ORDER BY- ordena por algum parametro Decrescente ou Crescente
         $query_users = "SELECT id, nome, email FROM users ORDER BY id ASC"; #ASC = ordena de forma crescente,  DESC -> de forma decrescente
         $result_users = mysqli_query($conn, $query_users);
         
         
         while ($row_user = mysqli_fetch_assoc($result_users)){
             extract($row_user);
             echo "ID:  $id <br>";
             echo "Nome: $nome <br>";
             echo "E-mail: $email <br>";
             echo "<hr>";
         }
         
        ?>
    </body>
</html>
