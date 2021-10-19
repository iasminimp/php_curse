
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Operadores de Lógicos </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
            $a = 10;
            $b=8;
            $c="";

            if(($a==10) AND ($b==8)){
                echo "Utilizado AND: Verdadeiro<br><br>";
            }else{
                echo"Utilizado AND:Falso <br><br>";
            }

            if(($a==10)OR($b==7)){
                echo"Utilizado OR: Verdadeiro <br><br>";
            }else{
                echo"Utilizado OR: False <br><br>";
            }

            if(($a==10)XOR($b==7)){
                echo"Utilizado XOR: Verdadeiro <br><br>";
            }else{
                echo"Utilizado XOR: False <br><br>";
            }

            if(!empty($c)){ /*Negação de vazia, se ela possui valor */
                echo"Utilizado!: Verdadeiro <br><br>";
            }else{
                echo"Utilizado!: False <br><br>";
            }

            if(($a==10)&&($b==8)){
                echo"Utilizado &&: Verdadeiro <br><br>";
            }else{
                echo "Utilizado &&: False <br><br>";
            }

            if(($a==10)||($b==8)){
                echo "Utilizado ||: Verdadeiro <br><br>";
            }else{
                echo"Utilizado ||: False <br><br>";
            }


        ?>
    </body>
    
</html>



