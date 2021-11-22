<?php
include_once './conexao.php';

//Id do usuário que será editado
$id = 2;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - SELECT/UPDATE</title>
    </head>
    <body>
        <h2>Formulário para Editar  - Endereços</h2>
        <?php
  
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        #var_dump($dados);
        
//Verificar se o usuário clicou no botão do formulário
        if (!empty($dados['SendUpUser'])) {
            //QUERY para editar o contato do usuario       
            $query_endereco = "UPDATE enderecos SET id = '" . $dados['id'] . "', logradouro = '" . $dados['logradouro'] . "', numero = '" . $dados['numero'] . "', bairro = '" . $dados['bairro'] . "', cidade = '" . $dados['cidade'] . "', complemento = '" . $dados['complemento'] . "', modified = NOW() WHERE id = " . $dados['id'];
           
            mysqli_query($conn, $query_endereco);
            if (mysqli_affected_rows($conn)) {
                echo "Usuário editado com sucesso!";                
            } else {
                echo "Erro: Usuário não editado com sucesso!";
            }
        }
        //QUERY para buscar as informações do usuário que será editado
        $query_endereco = "SELECT id, logradouro, numero, bairro, cidade, complemento, user_id
                        FROM enderecos 
                        WHERE id = $id";
        $result_enderecos = mysqli_query($conn, $query_endereco);
        $row_endereco = mysqli_fetch_assoc($result_enderecos);
        #var_dump($row_endereco);
        //extract($row_endereco);
        ?>

        <form method="POST" action="">
            
            <input type="hidden" name="id" id="user_id" value="<?php if (isset($row_endereco['id'])) {
                echo $row_endereco['id'];
            } ?>"
            
            <label>Logradouro: </label>
            <input type="text" name="logradouro" placeholder="Logradouro" value="<?php
            if (isset($dados['logradouro'])) {
                echo $dados['logradouro'];
            } else if (isset($row_endereco['logradouro'])) {
                echo $row_endereco['logradouro'];
            }
            ?>" ><br><br>

            <label>Número: </label>
            <input type="text" name="numero" placeholder="Número" value="<?php
            if (isset($dados['numero'])) {
                echo $dados['numero'];
            } else if (isset($row_endereco['numero'])) {
                echo $row_endereco['numero'];
            }
            ?>"><br><br>
            
            <label>Bairro: </label>
            <input type="text" name="bairro" placeholder="Bairro" value="<?php
            if (isset($dados['bairro'])) {
                echo $dados['bairro'];
            } else if (isset($row_endereco['bairro'])) {
                echo $row_endereco['bairro'];
            }
            ?>"><br><br>
            
            <label>Cidade: </label>
            <input type="text" name="cidade" placeholder="Cidade" value="<?php
            if (isset($dados['cidade'])) {
                echo $dados['cidade'];
            } else if (isset($row_endereco['cidade'])) {
                echo $row_endereco['cidade'];
            }
            ?>"><br><br>
            
            <label>Complemento: </label>
            <input type="text" name="complemento" placeholder="Complemento" value="<?php
            if (isset($dados['complemento'])) {
                echo $dados['complemento'];
            } else if (isset($row_endereco['complemento'])) {
                echo $row_endereco['complemento'];
            }
            ?>"><br><br>
          

            <input type="submit" value="Salvar" name="SendUpUser">
        </form>
    </body>
</html>
