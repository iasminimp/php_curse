
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Operadores de Lógicos </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
        //Comparação de uma varaivel 
            $a = 3; #basta modificar o valor da varivel pra verificar o funcionamento
            
            switch ($a) {
                case 1:
                    echo"Sacar dinheiro";
                    break;

                case 2:
                    echo"Depositar dinheiro";
                    break;
                case 3:
                    echo"Imprimir Extrato";
                    break;
                
                default:
                    echo "Opção Inválida";
                    break;
            }
            

        ?>
    </body>
    
</html>



