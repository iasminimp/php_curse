<?php
include_once './conexao.php';

//Id do usuário que será editado
$id = 5;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - UPDATE</title>
    </head>
    <body>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($dados);

        if (!empty($dados['SendUpUser'])) {
            $query_user = "UPDATE users SET nome = '" . $dados['nome'] . "', email = '" . $dados['email'] . "', sits_user_id = '" . $dados['sits_user_id'] . "', niveis_acesso_id = '" . $dados['niveis_acesso_id'] . "', modified = NOW() WHERE id = " . $dados['id'];
            mysqli_query($conn, $query_user);

            if (mysqli_affected_rows($conn)) {
                echo "Usuário editado com sucesso!";                
            } else {
                echo "Erro: Usuário não editado com sucesso!";
            }
        }

        $query_user = "SELECT id, nome, email, sits_user_id, niveis_acesso_id
                        FROM users 
                        WHERE id = $id";
        $result_user = mysqli_query($conn, $query_user);
        $row_user = mysqli_fetch_assoc($result_user);
        var_dump($row_user);
        //extract($row_user);
        ?>

        <form method="POST" action="">
            <input type="hidden" name="id" id="id" value="<?php if (isset($row_user['id'])) {
                echo $row_user['id'];
            } ?>"
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome completo" value="<?php
            if (isset($dados['nome'])) {
                echo $dados['nome'];
            } else if (isset($row_user['nome'])) {
                echo $row_user['nome'];
            }
            ?>" ><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="O melhor e-mail" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            } else if (isset($row_user['email'])) {
                echo $row_user['email'];
            }
            ?>"><br><br>

            <?php
            $query_sits_users = "SELECT id, nome FROM sits_users ORDER BY nome ASC";
            $result_sits_users = mysqli_query($conn, $query_sits_users);
            ?>
            <label>Situação: </label>
            <select name="sits_user_id" id="sits_user_id">
                <option value="">Selecione</option>
                <?php
                while ($row_sit_user = mysqli_fetch_assoc($result_sits_users)) {
                    $select_sits_user = "";
                    if (isset($dados['sits_user_id']) AND $dados['sits_user_id'] == $row_sit_user['id']) {
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
            <select name="niveis_acesso_id" id="niveis_acesso_id">
                <option value="">Selecione</option>
                <?php
                while ($row_nivel_acesso = mysqli_fetch_assoc($result_niveis_acessos)) {
                    $select_sits_user = "";
                    if (isset($dados['niveis_acesso_id']) AND $dados['niveis_acesso_id'] == $row_nivel_acesso['id']) {
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
