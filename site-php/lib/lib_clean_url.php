<?php
//echo "Página lib <br>";

ob_start(); //limpar o buffer

if(!defined('R4F5CC')){ //limitando acesso ao diretorio
    header("Location: /");//redirecionar para a raiz
    die("Erro: Página não encontrada!");
}


function cleanUrl($url) {
    var_dump($url);
    
    $format_a = '"!@#$%*()+{[}];:,\\\'<>°ºª';
    $format_b = '____________________________';
    $content_strtr = strtr($url, $format_a, $format_b);

    $content_replace = str_ireplace(" ", "", $content_strtr);

    $content_tag = strip_tags($content_replace);

    $content_url = trim($content_tag);
    var_dump($content_url);

    return $content_url;
}
