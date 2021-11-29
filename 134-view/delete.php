<?php
    session_start();
    include_once'./conexao.php';
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
    
?>




<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Apagar Usuário</title>
    </head>
    <body>
        <?php
            $query_user = "DELETE FROM users WHERE id=$id";
            mysqli_query($conn, $query_user);
            if(mysqli_affected_rows($conn)){
                $_SESSION['msg'] = "<p style='color:green'>Usuário apagado com sucesso!</p>";
                header("Location: index.php");
            }else{
                $_SESSION['msg'] =  "<p style='color:#f00'>Erro: Usuário não apagado com sucesso!</p>";
            }
        ?>
    </body>
</html>
