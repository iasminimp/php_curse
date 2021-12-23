<?php
    define('R4F5CC', true); //limitando o acesso a diretorio -- só pela INDEX

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
        <?php
            #include_once './app/sts/include/head.php';

            if(!empty($url)){ #verificacao para exibição de qual MENU sera exibido caso o arquivo exista
                if(file_exists("app/sts/view/". $path_page.".php")){
                    include_once './app/sts/include/head.php';
                }elseif(file_exists("app/int/view/". $path_page.".php")){ #adicionando uma pagina sobre a instituição
                    include_once './app/int/include/head.php';
                }else{
                    include_once './app/sts/include/head.php';
                }
            }else{
                include_once './app/sts/include/head.php';
                #echo 'URL não possui valor <br>';
            }
        ?>
        
    </head>
    <body>
        
        <?php
            #include_once './app/sts/include/menu.php'; #incluindo o Menu em todas as paginas

            if(!empty($url)){ #verificacao para exibição de qual MENU sera exibido caso o arquivo exista
                if(file_exists("app/sts/view/". $path_page.".php")){
                    include_once './app/sts/include/menu.php'; #incluindo o Menu 
                }elseif(file_exists("app/int/view/". $path_page.".php")){ #adicionando uma pagina sobre a instituição
                    include_once './app/int/include/menu.php'; #incluindo o Menu 
                }else{
                    include_once './app/sts/include/menu.php'; #incluindo o Menu 
                }
            }else{
                include_once './app/sts/include/menu.php'; #incluindo o Menu 
                #echo 'URL não possui valor <br>';
            }

           
           
            if(!empty($url)){ #verificacao para exibição de pagina
                if(file_exists("app/sts/view/". $path_page.".php")){
                    include "app/sts/view/".$path_page.".php";
                }elseif(file_exists("app/int/view/". $path_page.".php")){ #adicionando uma pagina sobre a instituição
                    include "app/int/view/".$path_page.".php";
                }else{
                    include "app/sts/view/404.php";
                }
                #echo 'URL possui valor <br>';
            }else{
                include 'app/sts/view/home.php';
                #echo 'URL não possui valor <br>';
            }



            
            #footer - nao a verificação, mesmo rodape para todas as paginas
            #include_once './app/sts/include/footer.php'; #incluindo o footer em todos as pages

            if(!empty($url)){ #verificacao para exibição de pagina
                if(file_exists("app/sts/view/". $path_page.".php")){
                    include_once './app/sts/include/footer.php'; #incluindo o footer em todos as pages
                }elseif(file_exists("app/int/view/". $path_page.".php")){ #adicionando uma pagina sobre a instituição
                    include_once './app/int/include/footer.php'; #incluindo o footer em todos as pages
                }else{
                    include_once './app/sts/include/footer.php'; #incluindo o footer em todos as pages
                }
                #echo 'URL possui valor <br>';
            }else{
                include_once './app/sts/include/footer.php'; #incluindo o footer em todos as pages
                #echo 'URL não possui valor <br>';
            }
            
        ?>
       
    </body>
</html>
