<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobre - Iasmin</title>
        <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>
    </head>
    <body>
        <?php
            //echo 'Hello, from Page SOBRE <br>';
            $query_abouts= "SELECT id, title, description_about, image_about 
            FROM sts_abouts_companies
            WHERE sts_situation_id = 1 /*com a situação 1 */
            ORDER BY id DESC
            LIMIT 40";          
            $result_abouts = mysqli_query($conn, $query_abouts);
            #WHILE, para listar mais de um usuário - looping
            while ($row_about = mysqli_fetch_assoc($result_abouts)){
                //var_dump($row_about);
                extract ($row_about);
                echo "ID: $id <br>";
                echo "Título: $title <br>";
                echo "Descrição: $description_about <br>";
                echo "Imagem: $image_about <br><hr>";
                
            }
        ?>
    </body>
</html>
