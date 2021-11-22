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
        
        <h2>Formulário para Cadastro IV - Endereços </h2>
        <?php
        //include_once './conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);    //prova real       
        #imprimindo variavel pro variavel
        //$nome= filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
           #imprimindo em forma de Vetor/ Lista
            if(!empty($dados['SendCadUser'])){
                //include_once './conexao.php';                
                $query_endereco = "INSERT INTO enderecos (logradouro, numero, bairro, cidade, complemento, user_id, created) "
                        . "VALUES ('".$dados['logradouro']."', '".$dados['numero']."', '".$dados['bairro']."','".$dados['cidade']."' ,'".$dados['complemento']."','".$dados['user_id']."', NOW())";
                mysqli_query($conn, $query_endereco);
                
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
            <label> Logradouro: </label>
            <input type = "text" name="logradouro" placeholder="Rua XX , Avenida , ..." value="<?php 
                if(isset ($dados['logradouro'])){
                    echo $dados['logradouro'];                   
                }   
            ?>"> <br><br>
            
            <label> Número: </label>
            <input type="text" name="numero" placeholder="Exemplo: 01,20,533,..." value="<?php 
                if(isset ($dados['numero'])){
                    echo $dados['numero'];                   
                }                
            ?>"><br><br>
            
            <label>Bairro: </label>
            <input type="text" name="bairro" placeholder="Nome do Bairro" value="<?php 
                if(isset ($dados['bairro'])){
                    echo $dados['bairro'];                   
                }                
            ?>"><br><br>
            
            <label>Cidade: </label>
            <input type="text" name="cidade" placeholder="Nome da Cidade" value="<?php 
                if(isset ($dados['cidade'])){
                    echo $dados['cidade'];                   
                }                
            ?>"><br><br>
            
            
            <label>Complemento: </label>
            <input type="text" name="complemento" placeholder="Complemento" value="<?php 
                if(isset ($dados['complemento'])){
                    echo $dados['complemento'];                   
                }                
            ?>"><br><br>
                
            <?php
                $query_user_id = "SELECT id, nome FROM users ORDER BY nome ASC"; #para exibir o id trocar o nome por ID antes de ASC
                $result_user_id = mysqli_query($conn, $query_user_id);
            ?>
                <label> ID/ Nome: </label>
            <select name="user_id" id="user_id">
                <option value=""> Selecione </option>
                <?php
                while($row_user_id=mysqli_fetch_assoc($result_user_id )){
                    $select_user_id =""; //criar a variavel vazia
                    if(isset($dados['sits_user_id'])AND ($dados['sits_user_id']==$row_user_id['id'])){
                        $select_user_id = "selected";
                    }                    
                echo "<option value ='".$row_user_id['id']. "' $select_user_id>".$row_user_id['nome']."</option>"; #e trocar a ultima tag nome por id
                } 
                #ta com um erro -> id não permanece salvo caso de erro ao enviar o cadastro
                ?>
            </select>
            <br><br>

            <input type="submit" value="Cadastrar" name="SendCadUser">
           
        </form>
        
        
    </body>
</html>
