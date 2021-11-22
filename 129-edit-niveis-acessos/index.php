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
        <h2>Formulário para Editar  - Niveis de Acesso  </h2>
        <?php
  
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($dados);
        
//Verificar se o usuário clicou no botão do formulário
        if (!empty($dados['SendUpUser'])) {
            //QUERY para editar o contato do usuario       
            $query_niveis_acesso = "UPDATE niveis_acessos SET id = '" . $dados['id'] . "', nome = '" . $dados['nome'] . "', modified = NOW() WHERE id = " . $dados['id'];
           
            mysqli_query($conn, $query_niveis_acesso);
            if (mysqli_affected_rows($conn)) {
                echo "Usuário editado com sucesso!";                
            } else {
                echo "Erro: Usuário não editado com sucesso!";
            }
        }
        //QUERY para buscar as informações do usuário que será editado
        $query_niveis_acesso = "SELECT id, nome
                        FROM niveis_acessos 
                        WHERE id = $id";
        $result_niveis_acessos = mysqli_query($conn, $query_niveis_acesso);
        $row_niveis_acesso = mysqli_fetch_assoc($result_niveis_acessos);
        var_dump($row_niveis_acesso);
        //extract($row_niveis_acesso);
        
      
        
        ?>

        <form method="POST" action="">
            
            <input type="hidden" name="id" id="user_id" value="<?php if (isset($row_niveis_acessoo['id'])) {
                echo $row_niveis_acesso['id'];
            } ?>"
            
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome" value="<?php
            if (isset($dados['nome'])) {
                echo $dados['nome'];
            } else if (isset($row_niveis_acesso['nome'])) {
                echo $row_niveis_acesso['nome'];
            }
            ?>" ><br><br>
            
            
            <?php
            $query_niveis_acesso = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
            $result_niveis_acessos = mysqli_query($conn, $query_niveis_acesso);
            ?>
            <label>Nível de Acesso: </label>
            <select name="niveis_acesso_id" id="niveis_acesso_id">
                <option value="">Selecione</option>
                <?php
                while ($row_nivel_acesso = mysqli_fetch_assoc($result_niveis_acessos)) {
                    $select_sits_user = "";
                    if (isset($dados['niveis_acesso_id']) AND $dados['niveis_acesso_id'] == $row_nivel_acesso['id']) {
                        $select_sits_user = "selected";
                    } elseif(isset($row_user['niveis_acesso_id']) AND $row_user['niveis_acesso_id']==$row_nivel_acesso['id']){
                        $select_sits_user = "selected";
                    }
                    echo "<option value='" . $row_nivel_acesso['id'] . "' $select_sits_user>" . $row_nivel_acesso['nome'] . "</option>";
                }
                ?>
            </select><br><br>

            <input type="submit" value="Salvar" name="SendUpUser">
        </form>
    </body>
</html>
