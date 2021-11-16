<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->

<?php
    include_once './conexao.php';    
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Insert Form</title>
    </head>
    <body>
        
        <h2>Formulário para Cadastro II - Usuário </h2>
        <?php
        //include_once './conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);    //prova real       
        #imprimindo variavel pro variavel
        //$nome= filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
           #imprimindo em forma de Vetor/ Lista
            if(!empty($dados['SendCadUser'])){
                //include_once './conexao.php';                
                $query_user = "INSERT INTO users (nome, email, senha, sits_user_id, niveis_acesso_id, created) VALUES ('".$dados['nome']."', '".$dados['email']."', '".$dados['senha']."', '".$dados['sits_user_id']."', '".$dados['niveis_acesso_id']."', NOW())";
                mysqli_query($conn, $query_user);
                
                if (mysqli_insert_id($conn)){#verificação de cadastro
                    echo "Inserido com sucesso! <br>";
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
                
            <?php
                $query_sits_users = "SELECT id, nome FROM sits_users ORDER BY nome ASC";
                $result_sits_users = mysqli_query($conn, $query_sits_users);
            ?>
            <label> Situação: </label>
            <select name="sits_user_id" id="sits_user_id">
                <option value=""> Selecione </option>
                <?php
                while($row_sit_user=mysqli_fetch_assoc($result_sits_users)){
                    $select_sits_user =""; //criar a variavel vazia
                    if(isset($dados['sits_user_id'])AND ($dados['sits_user_id']==$row_sit_user['id'])){
                        $select_sits_user = "selected";
                    }                    
                echo "<option value ='".$row_sit_user['id']. "' $select_sits_user>".$row_sit_user['nome']."</option>";
                }                         
                ?>
            </select>
            <br><br>
            <?php
                $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
                $result_niveis_acessos = mysqli_query($conn, $query_niveis_acessos);
            ?>
            
            <label> Nível de Acesso: </label>
            <select name="niveis_acesso_id" id="niveis_acesso_id">
                <option value="">Selecione</option>
                <?php
                    while($row_nivel_acesso=mysqli_fetch_assoc($result_niveis_acessos)){
                    $select_sits_user =""; //criar a variavel vazia
                    if(isset($dados['niveis_acesso_id'])AND ($dados['niveis_acesso_id']==$row_nivel_acesso['id'])){
                        $select_sits_user = "selected";
                    }                    
                echo "<option value ='".$row_nivel_acesso['id']. "' $select_sits_user>".$row_nivel_acesso['nome']."</option>";
                }
                
                ?>
                
                
            </select>
            
            
            <br><br>
            
            <input type="submit" value="Cadastrar" name="SendCadUser">
           
        </form>
        
        
    </body>
</html>
