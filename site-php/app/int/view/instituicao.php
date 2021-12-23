<!DOCTYPE html>

<html>
<!--    <head>
        <meta charset="UTF-8">
        <title>Sobre - Iasmin</title>
        <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>
    </head>
-->
    <body>
        <?php
            //echo 'Hello, from Page SOBRE <br>';
            $query_abouts= "SELECT id, title, description_about, image_about 
            FROM sts_abouts_companies
            /*WHERE sts_situation_id = 1 /*com a situação 1 */
            ORDER BY id ASC #DESC
            LIMIT 40";          
            $result_abouts = mysqli_query($conn, $query_abouts);
            #WHILE, para listar mais de um usuário - looping
            /*while ($row_about = mysqli_fetch_assoc($result_abouts)){
                //var_dump($row_about);
             #   extract ($row_about);

                echo "ID: $id <br>";
                echo "Título: $title <br>";
                echo "Descrição: $description_about <br>";
                echo "Imagem: $image_about <br><hr>";*/
        ?>
         <div class="jumbotron sobre">
        <div class='container'>
            <h2 class='display-4 text-center titulo'> Instituição</h2>
            <?php  
                while ($row_about = mysqli_fetch_assoc($result_abouts)){
                //var_dump($row_about);
                extract ($row_about);
            ?>
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading"> <?php echo $title;?></h2>
                    <p class="lead"><?php echo  $description_about;?></p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        src="app/sts/assets/images/sobre/<?php echo $id."/".$image_about;?>" width="500" height="500" alt="Detalhes dos serviços...">
                </div>
            </div>

            <hr class="featurette-divider">
            <?php } ?>
        </div>

        
    </div>
    </body>
</html>
