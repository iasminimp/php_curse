<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Insert Form</title>
    </head>
    <body>
        
        <h2>Formuário para Cadastro II - Usuário </h2>
        <?php
        //include_once './conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($dados);          
        #imprimindo variavel pro variavel
        //$nome= filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
           #imprimindo em forma de Vetor/ Lista
            if(!empty($dados['SendCadUser'])){
                include_once './conexao.php';                
                $query_user = "INSERT INTO users (nome, email, senha, sits_user_id, niveis_acesso_id, created) VALUES ('".$dados['nome']."', '".$dados['email']."', '".$dados['senha']."', '".$dados['sits_user_id']."', '".$dados['niveis_acesso_id']."', NOW())";
                mysqli_query($conn, $query_user);
                
                if (mysqli_insert_id($conn)){#verificação de cadastro
                    echo "Inserindo com sucesso! <br>";
                    echo "ID: ". mysqli_insert_id($conn);
                    echo "<br>";
                    unset($dados);
                }else{
                    echo "Erro ao inserido usuário!<br>";
                }                   
            }        
        ?>
        <!-- action vazio, vai pra mesma pagina -->
        <form method="POST" action="">
            <label> Nome: </label>
            <input type = "text" name="nome" placeholder="Nome Completo" value="<?php 
                if(isset ($dados['nome'])){
                    echo $dados['nome'];                   
                }   
            ?>"> <br><br>
            
            <label> E-mail: </label>
            <input type="email" name="email" placeholder="O seu melhor e-mail" value="<?php 
                if(isset ($dados['email'])){
                    echo $dados['email'];                   
                }                
            ?>"><br><br>
            
            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Senha do usuário" value="<?php 
                if(isset ($dados['senha'])){
                    echo $dados['senha'];                   
                }                
            ?>"><br><br>
        
            <label> Situação: </label>
            <input type="number" name="sits_user_id" placeholder="Situação" value="<?php 
                if(isset ($dados['sits_user_id'])){
                    echo $dados['sits_user_id'];                   
                }                
            ?>"><br><br>
            
            <label> Nível de Acesso: </label>
            <input type="number" name="niveis_acesso_id" placeholder="Nível de Acesso" alue="<?php 
                if(isset ($dados['niveis_acesso_id'])){
                    echo $dados['niveis_acesso_id'];                   
                }                
            ?>"><br><br>
            
            <input type="submit" value="Cadastrar" name="SendCadUser">
           
        </form>
        
        
    </body>
</html>
