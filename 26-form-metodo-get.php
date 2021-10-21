<!DOCTYPE html>
<!--
Implementação pelo NetBeans, metodo GET (Formulário)
-->
<html lang ="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - GET</title>
    </head>
    <body>
        <h2> Cadastrar Cliente</h2>
        <!-- Action, define pra qual pagina vai ser processado o formulário -->
        <form method="GET" action="26-proc-form-metodo-get.php">
            <labe>Nome: </labe>
            <input type="text" name="nome_cliente" placeholder="Digite o nome" required><br><br>

            <labe>E-mail:<labe/>
                <input type="email" name="email_cliente" placeholder="Digite o seu melhor e-mail" required><br><br>
            
                <input type="submit" value="cadastrar">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
