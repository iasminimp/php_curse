<?php
include_once './conexao.php';

//Id do usuário que será editado
$id = 5;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - SELECT/UPDATE</title>
    </head>
    <body>
        <h2>Formulário para Editar  - Contato </h2>
        <?php
  
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        #var_dump($dados);
        
//Verificar se o usuário clicou no botão do formulário
        if (!empty($dados['SendUpUser'])) {
            //QUERY para editar o contato do usuario
            $query_contato = "UPDATE contatos SET telefone = '" . $dados['telefone'] . "', celular = '" . $dados['celular'] . "', whatsapp = '" . $dados['whatsapp'] . "', modified = NOW() WHERE user_id = " . $dados['user_id'];
   
            
            mysqli_query($conn, $query_contato);
            if (mysqli_affected_rows($conn)) {
                echo "Usuário editado com sucesso!";                
            } else {
                echo "Erro: Usuário não editado com sucesso!";
            }
        }
        //QUERY para buscar as informações do usuário que será editado
        $query_contato = "SELECT telefone, celular, whatsapp, user_id
                        FROM contatos 
                        WHERE id = $id";
        $result_contato = mysqli_query($conn, $query_contato);
        $row_contato = mysqli_fetch_assoc($result_contato);
        #var_dump($row_contato);
        //extract($row_contato);
        ?>

        <form method="POST" action="">
            
            <input type="hidden" name="user_id" id="user_id" value="<?php if (isset($row_contato['user_id'])) {
                echo $row_contato['user_id'];
            } ?>"
            
            <label>Telefone: </label>
            <input type="text" name="telefone" placeholder="Telefone" value="<?php
            if (isset($dados['telefone'])) {
                echo $dados['telefone'];
            } else if (isset($row_contato['telefone'])) {
                echo $row_contato['telefone'];
            }
            ?>" ><br><br>

            <label>Celular: </label>
            <input type="text" name="celular" placeholder="Celular" value="<?php
            if (isset($dados['celular'])) {
                echo $dados['celular'];
            } else if (isset($row_contato['celular'])) {
                echo $row_contato['celular'];
            }
            ?>"><br><br>
            
            <label>WhatsApp: </label>
            <input type="text" name="whatsapp" placeholder="WhatsApp" value="<?php
            if (isset($dados['whatsapp'])) {
                echo $dados['whatsapp'];
            } else if (isset($row_contato['whatsapp'])) {
                echo $row_contato['whatsapp'];
            }
            ?>"><br><br>
          

            <input type="submit" value="Salvar" name="SendUpUser">
        </form>
    </body>
</html>
