<?php

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
