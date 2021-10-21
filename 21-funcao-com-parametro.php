
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Funções </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
        //Criação de Funções com parametros
        echo "<h4>Passagem por valor </h4>";

        function salario ($num){
            $num+=5;
            echo "Dentro da função - Salário com aumento: $num <br>";
        }

        $salario = 8200;
        salario($salario);
        echo "Salário sem aumento: $salario <br>";

        echo "<hr>";

        function salario_b($num){
            $num +=5;
            echo"Dentro da função - Salário com aumento $num <br>"; 
            return $num;
        }
        $salario=8200;
        $salario_com_aumento=salario_b($salario);
        echo "Exemplo 2 - Salário com aumento: $salario_com_aumento <br>";

        echo "<hr>";

        echo "<h4>Passagem por referência</h4>";
        function salario_a(&$num){
            $num+=10;
            echo "Dentro da função - Salário com aumento: $num <br>";
        }
        $salario_dois = 9300;
        salario_a($salario_dois);
        echo "Salário com aumento: $salario_dois <br>";




        ?>
    </body>
    
</html>



