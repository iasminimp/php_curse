<?php
include_once './conexao.php';

//Id do usuário que será editado
$id = 14;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - UPDATE</title>
    </head>
    <body>
        <h2>Formulário para Editar Usuário</h2>
        <?php
        //Receber os dados formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);
        //Verificar se o usuário clicou no botão do formulário
        if (!empty($dados['SendUpUser'])) {
            $empty_input = false;

            //Validar o campo individual
            /*if (empty($dados['nome'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo nome!</p>";
            } elseif (empty($dados['email'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo email!</p>";
            } elseif (empty($dados['sits_user_id'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo situação do usuário!</p>";
            } elseif (empty($dados['niveis_acesso_id'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo nível de acesso!</p>";
            }*/
            
            //Validar todos os campos
            $dados = array_map('trim', $dados);
            if(in_array('', $dados)){
                $empty_input = true;
                echo "<p style='color:#f00'>Necessário preencher todos os campos!</p>";
            }

            if (!$empty_input) {
                //QUERY para editar o usuário
                $query_user = "UPDATE users SET nome = '" . $dados['nome'] . "', email = '" . $dados['email'] . "', sits_user_id = '" . $dados['sits_user_id'] . "', niveis_acesso_id = '" . $dados['niveis_acesso_id'] . "', modified = NOW() WHERE id = " . $dados['id'];
                mysqli_query($conn, $query_user);

                if (mysqli_affected_rows($conn)) {
                    echo "<p style='color:green'>Usuário editado com sucesso!</p>";
                } else {
                    echo "<p style='color:#f00'>Erro: Usuário não editado com sucesso!</p>";
                }
            }
        }

        //QUERY para buscar as informações do usuário que será editado
        $query_user = "SELECT id, nome, email, sits_user_id, niveis_acesso_id
                        FROM users 
                        WHERE id = $id";
        $result_user = mysqli_query($conn, $query_user);
        $row_user = mysqli_fetch_assoc($result_user);
        //var_dump($row_user);
        //extract($row_user);
        ?>

        <form method="POST" action="">
            <input type="hidden" name="id" id="id" value="<?php
            if (isset($row_user['id'])) {
                echo $row_user['id'];
            }
            ?>"
                   <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome completo" value="<?php
            if (isset($dados['nome'])) {
                echo $dados['nome'];
            } else if (isset($row_user['nome'])) {
                echo $row_user['nome'];
            }
            ?>" required><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="O melhor e-mail" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            } else if (isset($row_user['email'])) {
                echo $row_user['email'];
            }
            ?>" required><br><br>

            <?php
            $query_sits_users = "SELECT id, nome FROM sits_users ORDER BY nome ASC";
            $result_sits_users = mysqli_query($conn, $query_sits_users);
            ?>
            <label>Situação: </label>
            <select name="sits_user_id" id="sits_user_id" required>
                <option value="">Selecione</option>
                <?php
                while ($row_sit_user = mysqli_fetch_assoc($result_sits_users)) {
                    $select_sits_user = "";
                    if (isset($dados['sits_user_id']) AND $dados['sits_user_id'] == $row_sit_user['id']) {
                        $select_sits_user = "selected";
                    } elseif (isset($row_user['sits_user_id']) AND $row_user['sits_user_id'] == $row_sit_user['id']) {
                        $select_sits_user = "selected";
                    }
                    echo "<option value='" . $row_sit_user['id'] . "' $select_sits_user>" . $row_sit_user['nome'] . "</option>";
                }
                ?>
            </select>
            <br><br>

            <?php
            $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
            $result_niveis_acessos = mysqli_query($conn, $query_niveis_acessos);
            ?>
            <label>Nível de Acesso: </label>
            <select name="niveis_acesso_id" id="niveis_acesso_id" required>
                <option value="">Selecione</option>
                <?php
                while ($row_nivel_acesso = mysqli_fetch_assoc($result_niveis_acessos)) {
                    $select_sits_user = "";
                    if (isset($dados['niveis_acesso_id']) AND $dados['niveis_acesso_id'] == $row_nivel_acesso['id']) {
                        $select_sits_user = "selected";
                    } elseif (isset($row_user['niveis_acesso_id']) AND $row_user['niveis_acesso_id'] == $row_nivel_acesso['id']) {
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
