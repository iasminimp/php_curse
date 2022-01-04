<?php

    #pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    #definição da URL da área administrativa
    define('URLADM', "http://localhost/admin-site-php/adm");

    #Constantes com o valor do banco de dados
    define('HOST', "localhost");
    define('USER', "root");
    define('PASS', "");
    define('DBNAME', "i4smin_dois");
    define('PORT', 3306);

    #constante que define o email do administrador 
    define ('EMAILADM', 'iasminimp7@gmail.com');
    



?>