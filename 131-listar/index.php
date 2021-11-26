<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>IASMIN - Listar</title>
    </head>
    <body>
        <h2>Listar Usuários</h2>
        <a href="add.php">Cadastrar </a><br><br>        
        <?php
            $query_users = "SELECT id, nome, email, sits_user_id, niveis_acesso_id, created, modified FROM users ORDER BY id DESC";
            $result_users = mysqli_query($conn, $query_users);
            
            while($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";                
                echo "E-mail: $email <br>";
                echo "Situação do Usuário: $sits_user_id <br>";
                echo "Nível de Acesso: $niveis_acesso_id <br>";
                echo "Cadastro: ".date('d/m/Y H:i:s', strtotime($created))."<br>";
                if(!empty($modified)){
                    echo "Editado: ".date('d/m/Y H:i:s',strtotime($modified))."<br>";
                }else{
                    echo "Editado: <br>";
                }
                echo "<hr>";
                
            }
        
        ?>

    </body>
</html>
