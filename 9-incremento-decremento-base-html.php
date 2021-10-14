<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset = "UTF-8">
        <title>Iasmin - Incremento e Decremento</title> 
        <link rel = "shortcut icon" href="favicon.ico" type ="image/x-ico">
    </head>

    <body>
        <?php
            echo "<h3> Pós-incremento </h3>";
            $a = 5;
            echo "Deve ser 5: " .$a++. "<br>"; //$a++ => incrementou depois da varivel;
            echo "Deve ser 6: " .$a. "<br><br>";

            echo "<h3> Pré-incremento </h3>";
            $a = 5;
            echo "Deve ser 6: " .++$a. "<br>"; //$a++ => incrementou depois da varivel;
            echo "Deve ser 6: " .$a. "<br><br>";

            echo "<h3> Pós-Decremento </h3>";
            $a = 10;
            echo "Deve ser 10: " .$a--. "<br>"; //$a++ => incrementou depois da varivel;
            echo "Deve ser 9: " .$a. "<br><br>";

            echo "<h3> Pre-Decremento </h3>";
            $a = 10;
            echo "Deve ser 9: " .--$a. "<br>"; //$a++ => incrementou depois da varivel;
            echo "Deve ser 9: " .$a. "<br><br>";
        ?>
        
    </body>

</html>




