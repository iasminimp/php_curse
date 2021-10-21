<?php

#recebimento de dados do formulario get do 26-form-metodo-get.php
//$nome_cliente = $_GET[ 'nome_cliente']; #metodo $_GET não recomendavel, recomendavel filter_input

$nome_cliente = filter_input(INPUT_GET, "nome_cliente", FILTER_SANITIZE_STRING);
$email_cliente = filter_input(INPUT_GET, "email_cliente", FILTER_SANITIZE_EMAIL);

echo "Nome do cliente: " . $nome_cliente . "<br>";
echo "E-mail do cliente: ".$email_cliente."<br>";

?>