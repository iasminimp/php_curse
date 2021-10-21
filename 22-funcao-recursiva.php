<!DOCTYPE html>

<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Função Recursiva</title>
        <link rel = "shortcut icon" href="favicon.ico" type="image/x-ico">
    </head>

    <body>
        <?php
            echo "<h4> Função Recursiva</h4>";
            function exibe($num){
                if ($num>0){
                    echo "Valor passado para a função: $num <br>";
                    $qnt = $num -1;
                    exibe($qnt);
                }
            }
            exibe(10);

        ?>


    </body>

</html>