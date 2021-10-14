<?php
$a=1;
$b=2;
$c = 3;

$result = 6;
$double_b = $b*$b;
$result += $a;//$result = $result+$a;
echo "$b + $b = $double_b <br>";
echo "Resultado da adição é: ". $result. "<br>";

echo "O resto do valor $result pelo valor $b <br>";
$result%=$b;
echo "Resultado do Módulo: " .$result. "<br><br>";

echo "<br> Exemplo de concatenação de strings <br>";

$basico = "Bom " . "dia, " . "Cesar.";
echo $basico;;
echo "<br>";

//esse é o melhor, pois utiliza apenas uma varaivel e ocupa menos espaço na memoria;
$d= "Bom ";
$d .= "dia, ";
$d .= "Cesar.";
echo $d;

echo "<br>";
$a = "Bom ";
$b = "dia, ";
$c = "Cesar.";
echo $a . $b . $c;

?>