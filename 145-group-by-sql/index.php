<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - GROUP BY</title>
    </head>
    <body>
        <h2>Listar as aulas visualizadas e a quantidade</h2>
        <?php
        $id_usuario = 5;
        
        $query_acessos = "SELECT aul.id, aul.nome,
            COUNT(ace.aula_id) AS qnt_acessos, ace.aula_id, ace.user_id,
            usr.nome nome_usr
            FROM aulas AS aul
            INNER JOIN acessos AS ace ON ace.aula_id = aul.id
            INNER JOIN users AS usr ON usr.id = ace.user_id
            WHERE user_id = $id_usuario
            GROUP BY ace.aula_id";
        $result_acessos = mysqli_query($conn, $query_acessos);
        while ($row_acesso = mysqli_fetch_assoc($result_acessos)){
            //var_dump($row_acesso);
            extract($row_acesso);
            echo "Nome da aula: $nome <br>";
            echo "Quantidade de visualização da aula: $qnt_acessos <br>";            
            echo "<hr>";
        }
        ?>
    </body>
</html>
