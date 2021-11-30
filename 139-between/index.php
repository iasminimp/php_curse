<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - BETWEEN PESQUISAR ENTRE DATAS</title>
    </head>
    <body>
        <h2>Pesquisar entre datas</h2>

        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        ?>

        <form method="POST" action="">
            <label>Data de inicio</label>
            <input type="date" name="data_inicio" value="<?php if (isset($dados['data_inicio'])) {
            echo $dados['data_inicio'];
        } ?>"><br><br>

            <label>Data final</label>
            <input type="date" name="data_final" value="<?php if (isset($dados['data_final'])) {
            echo $dados['data_final'];
        } ?>"><br><br>

            <input type="submit" value="Pesquisar" name="SearchUser">
        </form>
        <br><hr><br>
        <?php
        if (!empty($dados['SearchUser'])) {
            //$data_inicio = "2021-01-07";
            //$data_final = "2021-01-14";
            $query_users = "SELECT id, nome, email, created
                FROM users
                WHERE created BETWEEN '" . $dados['data_inicio'] . "' AND '" . $dados['data_final'] . "' ";
            $result_users = mysqli_query($conn, $query_users);
            while ($row_user = mysqli_fetch_assoc($result_users)) {
                extract($row_user);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Data de Cadastro: " . date('d/m/Y H:i:s', strtotime($created)) . "<br>";
                echo "<hr>";
            }
        }
        ?>
    </body>
</html>
