<!DOCTYPE html>

<html lang='pt-br'>
    <head>
        <meta charset="UTF-8">
        <title> Iasmin - Cookies</title>
        <link rel = "shortcut icon" href="favicon.ico" type="image/x-ico">
    </head>

    <body>
        <?php
            echo "<h4> Cookies</h4>";
            #cookie é salvo no navegador do usuário
            #setcookie("nome_do_cookie", "valor_do_cookie");

            setcookie("afiliado","5323", (time()+(3*24*3600)));
            $afiliado = $_COOKIE['afiliado'];
            echo "Número do afiliado: ".$afiliado."<br>";

            setcookie("logado", "Iasmin", (time()+(2*3600)));
            if(isset($_COOKIE ["logado"])){
                echo "Usuário " .$_COOKIE["logado"]. " logado <br>";
            }else{
                echo "Cookies inválido <br>";
            }

        ?>


    </body>

</html>