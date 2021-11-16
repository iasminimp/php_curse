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
        
        <h2>Formulário para Cadastro V - Niveis de Acesso </h2>
        <?php
        //include_once './conexao.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);    //prova real       
        #imprimindo variavel pro variavel
        //$nome= filter_input(INPUT_POST, "nome", FILTER_DEFAULT);
           #imprimindo em forma de Vetor/ Lista
            if(!empty($dados['SendCadUser'])){
                //include_once './conexao.php';                
                $query_niveis_acessos = "INSERT INTO niveis_acessos (nome, created) VALUES ('".$dados['nome']."', NOW())";
                mysqli_query($conn, $query_niveis_acessos);
                
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
            <input type = "text" name="nome" placeholder="Nome do Nível de Acesso" value="<?php 
                if(isset ($dados['nome'])){
                    echo $dados['nome'];                   
                }   
            ?>"> <br><br>
            

            <input type="submit" value="Cadastrar" name="SendCadUser">
           
        </form>
        
        
    </body>
</html>
