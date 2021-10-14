<?php

$a = 2;
$b=4;
$c=7;

$result_soma = $a + $b;
echo "Soma: " .$result_soma."<br>";
//echo "> Soma: $result_soma <br>.";


$result_subtracao = $b - $a;
echo "Subtracao: " .$b. "-" .$a. "=".$result_subtracao."<br>";

$result_multiplicacao = $b* $a;
echo "Multiplicação: " .$result_multiplicacao. "<br>";

$result_divisao = $b/$a;
echo "Divisão: ".$result_divisao. "<br>";

$result_rest = $b%$a;
echo "Resto da Divisão: ".$result_rest. "<br>";

$result_real = $c/$a;
echo "Valor: R$ ".number_format($result_real,2,",",".")."<br>";
//number_format(nome_variavel,numero_de_casas,colocar ',' p/ os decimais, colocar '.' na casa de milhares);


echo "<br> Exemplo de utilização de Operadores - Banco (saque/debito) <br>";

$cc = 38564.32;
echo "<br> Valor na conta corrente: R$ " .number_format($cc,2,",",".")."<br>";

$debito = 200.16;
echo "Valor do débito: R$ " .number_format($debito,2,",",".")."<br>";


$result_real = $cc -$debito;
echo "Valor: R$ ".number_format($result_real,2,",",".")."<br>";

?>