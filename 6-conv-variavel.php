<?php
//conversão de variaveis

$result = "2"; //string

echo "Resultado exemplo um: " . $result."<br>";
var_dump($result); //mostra o tipo de variavel - caminho

$result_dois= $result+1; //somando 1 a variavel Result, result = 3 //inteiro
echo "Resultado exemplo dois: " . $result_dois."<br>";
var_dump($result_dois); //mostra o tipo de variavel - caminho


$result_tres= $result_dois+3.5; //somando 1 a variavel Result, result = 3 //inteiro
echo "Resultado exemplo três: " . $result_tres."<br>";
var_dump($result_tres); //mostra o tipo de variavel - caminho

$result_quatro = 11;
var_dump($result_quatro);


$result_cinco = (double) $result_quatro; //conversão explicita - para float/double;
echo "Resultado exemplo cinco: " . $result_cinco. "<br>";
var_dump($result_cinco);


$result_seis = 7.9;
var_dump($result_seis);


$result_sete = (int) $result_seis; //conversão explicita
var_dump($result_sete);

/*
$result=$result+3.5; //double result = 6.5;
$result = 1+4.7; //result é o double 5.7
echo "Resultado exemplo um: " . $result."<br>";
*/


?>