<?php
include_once './conexao.php';
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - LIKE</title>
    </head>
    <body>
        <h2>Como Pesquisar com o LIKE & MySQLi</h2>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($dados);
        
        ?>
        
                
        <form method="POST" action=""> <!-- comment -->
            <label>Nome do usuário: </label>
            <input type="text" name="nome" id="nome" placeholde="Digite o nome do usuário" value="<?php
                if(isset($dados['nome'])){
                    echo $dados ['nome'];
                }
            ?>"> <br><br>
            
            <label>E-mail do usuário: </label>
            <input type="text" name="email" id="nome" placeholde="Digite o e-mail do usuário" value="<?php
                if(isset($dados['email'])){
                    echo $dados ['email'];
                }
            ?>"> <br><br>
            
            
            
            
            <input type="submit" value="Pesquisar" name="SearchUser">
        
        </form><br><hr>
        
        <?php
        if(!empty($dados['SearchUser'])){
            if(!empty($dados['nome']) AND !empty($dados['email'])){ //pesquisa por email ou usuário
                $query_users = "SELECT id, nome, email "
                    . "FROM users "
                    . "WHERE nome LIKE '".$dados['nome']."%' "
                    . "OR email LIKE '%".$dados['email']."%'";                
            }elseif(!empty ($dados['nome'])){ //pesquisa por nome
                $query_users = "SELECT id, nome, email "
                    . "FROM users "
                    . "WHERE nome LIKE '".$dados['nome']."%' ";
            }elseif(!empty ($dados['email'])){ //pesquisa por email
                $query_users = "SELECT id, nome, email "
                    . "FROM users "
                    . "WHERE nome LIKE '".$dados['email']."%' ";
            }
        
            $result_users = mysqli_query($conn, $query_users);
            
            while($row_user = mysqli_fetch_assoc($result_users)){
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "<hr>";
            }
        }
        ?>
        

    </body>
</html>
