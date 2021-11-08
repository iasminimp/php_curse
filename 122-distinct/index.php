<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Distinct</title>
    </head>
    <body>
        <?php
            include_once './conexao.php';
            #utilizando o DIstinct => para pegar valores diferentes/ distintos
            $query_acessos = "SELECT DISTINCT aula_id, user_id FROM acessos WHERE user_id =5";
            $result_acessos= mysqli_query($conn, $query_acessos);
            
            while($row_acesso = mysqli_fetch_assoc($result_acessos)){
                extract($row_acesso);
                echo "ID da Aula: $aula_id <br>";
                echo "ID do Usuário: $user_id <br>";
                echo "<hr>";
            }
        ?>
    </body>
</html>
