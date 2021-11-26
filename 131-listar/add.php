<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - VALIDAR FORMULARIO</title>
    </head>
    <body>
        <h2>Formulário para Cadastrar Usuário</h2>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);

        if (!empty($dados['SendCadUser'])) {
            $empty_input = false;

            //Validar o campo individual
            /*if (empty($dados['nome'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo nome!</p>";
            } elseif (empty($dados['email'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo email!</p>";
            } elseif (empty($dados['senha'])) {
                $empty_input = true;
                echo "<p style='color:#f00'>Preencha o campo senha!</p>";
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
                $query_user = "INSERT INTO users (nome, email, senha, sits_user_id, niveis_acesso_id, created) VALUES ('" . $dados['nome'] . "', '" . $dados['email'] . "', '" . $dados['senha'] . "', '" . $dados['sits_user_id'] . "', '" . $dados['niveis_acesso_id'] . "', NOW())";
                mysqli_query($conn, $query_user);

                if (mysqli_insert_id($conn)) {
                    echo "<p style='color:green'>Usuário cadastrado com sucesso, id do registro " . mysqli_insert_id($conn) . "!</p>";
                    unset($dados);
                } else {
                    echo "<p style='color:#f00'>Erro: Usuário não cadastrado com sucesso!</p>";
                }
            }
        }
        ?>

        <form method="POST" action="">
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome completo" value="<?php
        if (isset($dados['nome'])) {
            echo $dados['nome'];
        }
        ?>" required><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="O melhor e-mail" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
        ?>" required><br><br>

            <label>Senha: </label>
            <input type="password" name="senha" placeholder="Senha do usuário" value="<?php
            if (isset($dados['senha'])) {
                echo $dados['senha'];
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
                    }

                    echo "<option value='" . $row_nivel_acesso['id'] . "' $select_sits_user>" . $row_nivel_acesso['nome'] . "</option>";
                }
                ?>
            </select><br><br>

            <input type="submit" value="Cadastrar" name="SendCadUser">
        </form>
    </body>
</html>
