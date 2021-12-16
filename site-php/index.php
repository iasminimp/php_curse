<?php
    include_once './lib/lib_clean_url.php';
    include_once './config/config.php';
    include_once './config/connection.php'; #incluindo a conexão com o banco de dados
    
    $url=filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
    $url_clean = cleanUrl($url);
    #var_dump($url); #verificar se esta recebendo informação da URL

    $url_path = explode("/", $url_clean);
    #var_dump($url_path);

    if (isset($url_path[0])){
        $path_page = $url_path[0];
        #echo "Posição 1 - page: $path_page <br>";
    }else{
        $path_page="";
    }

    if (isset($url_path[1])){
        $path_detail = $url_path[1];
        #echo "Posição 2 - page: $path_detail <br>";
    }else{
        $path_detail="";
    }

?>

<!DOCTYPE html>
<!-- Testando a URL do projeto, se o usuário esta ou nao enviando algo pela URL-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home - Iasmin</title>
        <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>
    </head>
    <body>
        
        <?php
            include_once './app/sts/include/menu.php';
        
            if(!empty($url)){
                if(file_exists("app/sts/view/". $path_page.".php")){
                    include "app/sts/view/".$path_page.".php";
                }else{
                    include "app/sts/view/404.php";
                }
                #echo 'URL possui valor <br>';
            }else{
                include 'app/sts/view/home.php';
                #echo 'URL não possui valor <br>';
            }
        ?>
        <script src="app\sts\assets\js\jquery.min.js"> </script> <!--dentro do projeto -->
        
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    </body>
</html>
