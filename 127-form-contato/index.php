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
        
        <h2>Formulário para Cadastro III - Contato </h2>
        <?php
        //include_once './conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);    //prova real       
        #imprimindo variavel pro variavel
        //$nome= filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
           #imprimindo em forma de Vetor/ Lista
            if(!empty($dados['SendCadUser'])){
                //include_once './conexao.php';                
                $query_contato = "INSERT INTO contatos (telefone, celular, whatsapp, user_id, created) VALUES ('".$dados['telefone']."', '".$dados['celular']."', '".$dados['whatsapp']."', '".$dados['user_id']."', NOW())";
                mysqli_query($conn, $query_contato);
                
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
            <label> Telefone: </label>
            <input type = "text" name="telefone" placeholder="(xx) xxxxx - xxxx" value="<?php 
                if(isset ($dados['telefone'])){
                    echo $dados['telefone'];                   
                }   
            ?>"> <br><br>
            
            <label> Celular: </label>
            <input type="text" name="celular" placeholder="(xx) xxxxx - xxxx" value="<?php 
                if(isset ($dados['celular'])){
                    echo $dados['celular'];                   
                }                
            ?>"><br><br>
            
            <label>Whats App: </label>
            <input type="text" name="whatsapp" placeholder="(xx) xxxxx - xxxx" value="<?php 
                if(isset ($dados['whatsapp'])){
                    echo $dados['whatsapp'];                   
                }                
            ?>"><br><br>
                
            <?php
                $query_user_id = "SELECT id, nome FROM users ORDER BY id ASC";
                $result_user_id = mysqli_query($conn, $query_user_id);
            ?>
                <label> ID: </label>
            <select name="user_id" id="user_id">
                <option value=""> Selecione </option>
                <?php
                while($row_user_id=mysqli_fetch_assoc($result_user_id )){
                    $select_user_id =""; //criar a variavel vazia
                    if(isset($dados['sits_user_id'])AND ($dados['sits_user_id']==$row_user_id['id'])){
                        $select_user_id = "selected";
                    }                    
                echo "<option value ='".$row_user_id['id']. "' $select_user_id>".$row_user_id['id']."</option>";
                } 
                #ta com um erro -> id não permanece salvo caso de erro ao enviar o cadastro
                ?>
            </select>
            <br><br>

            <input type="submit" value="Cadastrar" name="SendCadUser">
           
        </form>
        
        
    </body>
</html>
