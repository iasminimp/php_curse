<?php
#pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }
    
    //echo "acessou a Lib <br>";

    function cleanUrl($url){
        #var_dump($url);
        $format_a='"!@#$%*()+{[}];:,\\\' <>ªº°'; #formato A
        $format_b='____________________________'; #formato B

        $content_strtr=strtr($url,$format_a, $format_b); #transformando o formato A para B
        $content_replace=str_ireplace(" ", "", $content_strtr); #removendo os espaços em Branco
        $content_tag = strip_tags($content_replace);
        $content_url = trim($content_tag);
        return $content_url;
        //var_dump($content_replace);

    }
?>