<?php

    ob_start();#limpa o buffer de saida
    
    #LIMITANDO o acesso do usuario - nao pode visualizar a LIB
    define('R4F5CC', true);

    #Inclusão - limpando a URL
    include_once './lib/lib_clean_url.php';

    #incluindo - conexao com o BD (constantes)
    include_once './config/config.php';

    #incluindo  - conexão com o BD
    include_once './config/connection.php';

    
    //carregando estaticamente um caminho para a pagina
    // $path_page="login"; //conectado a URL
    $url = filter_input(INPUT_GET, "variavel", FILTER_SANITIZE_STRING);
    #var_dump($url);
    
    #chamando a função para limpar a URL (retirada de caracteres)
    $url_clean = cleanUrl($url);

    # $url_clean //variavel que possui a url limpa, sem alguns caracteres
    
    $url_path = explode("/", $url_clean);//converte a string em um array/ vetor
    #var_dump($url_path);
    //$path_page = $url;

    #passando um parametro - na URL
    if(isset($url_path['0'])){
        $path_page = $url_path['0'];
    }else{
        $path_page = "";
    }
    #passando dois parametros - na URL
    if(isset($url_path['1'])){
        $path_detail=$url_path['1'];
    }else{
        $path_detail="";
    }

    #passando três parametros - na URL
    /*if(isset($url_path['2'])){
        $path_detail_b = $url_path['2'];
    }else{
        $path_detail_b="";
    }*/
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administrativo - Iasmin</title>
    </head>
    <body>
        <?php
            //Verificar se a variavel $path_page possui valor
            if(!empty($path_page)){
                if(file_exists("app/adms/views/".$path_page.".php")){//verificando se o arquivo existe
                    include_once "app/adms/views/".$path_page.".php";         
                }else{
                    include_once "app/adms/views/404.php";
                }    
            }else{ //caso o caminho - $path_page - esteja vazio ira exibir uma pagina padrao
                include_once "app/adms/views/login.php";
            }
            //echo " - Pagina Inicial <br>";
        ?>

        <!-- Scripts JAVA -->
        <!--pelo link - sem baixar o java -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
        <!-- 
        <script src="app/adms/assets/js/jquery.min.js"></script>
        <script src="app/adms/assets/js/custom.js"></script>        -->
    </body>

</html>