<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke - AVG</title>
    </head>
    <body>
        <h2>Quantidade de vezes que a aula é visualizada</h2>
        <?php
        $aula = 3;
        $query_acessos = "SELECT FORMAT(AVG(qnt_acessos), '#') AS qnt_acessos
            FROM acessos
            WHERE aula_id = $aula ";
        $result_acessos = mysqli_query($conn, $query_acessos);
        $row_acesso = mysqli_fetch_assoc($result_acessos);
        //var_dump($row_acesso);
        echo "Média de acesso da aula $aula: " . $row_acesso['qnt_acessos'] . "<br>";
        ?>
    </body>
</html>
