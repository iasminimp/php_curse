<?php
    #sessao tem que vir primeiro
    session_start(); #inicia a sessão
?>

<!DOCTYPE html>

<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Sessão</title>
        <link rel = "shortcut icon" href="favicon.ico" type="image/x-ico">
    </head>

    <body>
        <?php
            echo "<h4> Sessão</h4>";
            //criar sessão
            $_SESSION['id']=2;
            $_SESSION['nome'] = "Iasmin";

            //Verificar se existe a sessão id
            if(isset($_SESSION['id'])){
                echo "ID do usuário " .$_SESSION['nome']. " é " .$_SESSION['id']. "<br>";
            }else{
                echo "A sessão não encontrada <br>";
            }

            //Excluir a sessão
            unset($_SESSION['id'], $_SESSION['nome']);

            #echo "O usuário " .$_SESSION['id']. "<br>";

            //Verificar se existe a sessão nome
            if(isset($_SESSION['name'])){
                echo "O usuário " . $_SESSION['nome']. "<br>";
            }else{
                echo "Não econtrado o nome do usuário na sessão! <br>";
            }
        ?>


    </body>

</html>