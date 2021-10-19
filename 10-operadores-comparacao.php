
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Operadores de Comparação </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
               /* == igual a
                */

                $a=10;
                $b=10;

                /*operador de igualdade */
                echo "<h3>Operador de Iguadade (==)</h3> <br>";
                if($a==$b){
                    echo "Verdadeiro: o número $a é igual ao valor $b <br><br>";
                }else{
                    echo "Falso: o número $a não é igual ao valor $b<br><br>";
                }

                /*operador de diferença*/
                echo "<h3>Operador de Diferença (!=)</h3><br>";
                if($a!=$b){
                    echo "Verdadeiro: o número $a é diferente de $b <br><br>";
                }else{
                    echo "Falso; o número $a é igual ao valor de $b <br> <br>";
                }               

                /*Operador maior */
                echo"<h3>Operador Maior (a > b)</h3><br>";
                if($a>$b){
                    echo"Verdadeiro: o número $a é maior que $b<br><br>";
                }else{
                    echo"Falso: o número $a não é maior que $b <br><br>";
                }

                /*Operador menor */
                echo"<h3>Operador Menor (a < b) </h3><br>";
                if($a<$b){
                    echo"Verdadeiro: o número $a é menor que $b<br><br>";
                } else{
                    echo "Falso: o número $a não é menor que $b <br><br>";        
                }

                /*Maior igual */
                echo"<h3>Operador Maior Igual (> =) </h3><br>";
                if($a>=$b){
                    echo"Verdadeiro: o valor de $a é maior ou igual a $b <br><br>";
                }else{
                    echo"Falso: o valor de $a não é maior ou igual a $b <br><br>";
                }

                /*Menor igual */
                echo"<h3>Operador Menor Igual (< =) </h3><br>";
                if($a<=$b){
                    echo"Verdadeiro: o valor de $a é menor ou igual a $b<br><br>";
                }else{
                    echo"Falso: o valor de $a não é menor ou igual a $b <br><br>";
                }
        ?>
    </body>
    
</html>



