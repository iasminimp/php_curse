
<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Funções </title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-ico">
    </head> 
    <body>
        <?php
        //Criação de Funções
            function promocao2(){
                $msg2 = "Código válido <br>";
                return $msg2;
            }
            echo promocao2();

            echo"<hr>";


            function promocao($codigo=null){
                if ($codigo == "cursophp"){
                    $msg = "Código Válido";
                }else{
                    $msg = "Código Inválido";
                }
                return $msg;
            }
            $codigo_curso = "Curso Php";
            $retorno_dados_func = promocao($codigo_curso);
            echo $retorno_dados_func. "<br>";

            echo "<hr>";

            #precisa declarar novamente as variavel
            $codigo_curso = "Curso Php";
            $retorno_dados_func = promocao($codigo_curso);
            $status_promo = $retorno_dados_func. ": ". $codigo_curso. "<br>";
            echo $status_promo;



        ?>
    </body>
    
</html>



