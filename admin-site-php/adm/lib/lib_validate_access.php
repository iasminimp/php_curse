<?php

    if(!defined('R4F5CC')){#pagina Limpar URL - LIB
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }
    

    //echo "Validar permissão de Acesso!<br>";
    function validateAccess($path_page){
        var_dump($path_page);

         #pages permitidas ao acesso publico
        $page_public = ["login", "sair", "404"]; #array de paginas publicas
        
        #pages permitidas somente para usuários administrativo
        $page_restricted = ["dashboard", "users"]; #array de paginas restritas

        if(in_array($path_page, $page_public)){
            return $path_page;
        }elseif(in_array($path_page, $page_restricted)){
            //echo "Usuário precisar esta logado<br>";
            #verificando se o usuário esta logado 
            if(verifyLogin()){
                return $path_page;
            }else{
                return "login";
            }
        }else{
            return "login"; #redireciona para a pagina de Login
        }
    }

    #validação de paginas atraves da url

    #verifica se o usuario esta logado para acessar a area administrativa
    function verifyLogin(){
        if(isset($_SESSION['user_id']) AND isset($_SESSION['user_key'])){
            return true;
        }else{
            $_SESSION['msg'] = "<p style='color:#f00'> Para acessar a página é necessário estar logado!<p>";
            return false;
        } 
    }
?>

