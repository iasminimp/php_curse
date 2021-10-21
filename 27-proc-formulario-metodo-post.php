<?php
#metodo não recomendavel $_POST
    $nome_cliente_antigo = $_POST['nome_cliente'];
    echo "Nome do cliente: " .$nome_cliente_antigo."<br>";
    
    echo "<hr>"; #linha para separar
    
    $nome_cliente = filter_input(INPUT_POST, "nome_cliente", FILTER_SANITIZE_STRING);
    $email_cliente = filter_input(INPUT_POST, "email_cliente", FILTER_SANITIZE_EMAIL);
    
    echo "Nome do cliente: " .$nome_cliente. "<br>";
    echo "E-mail do cliente: " .$email_cliente. "<br>";
    
    #recebendo as variaveis atraves de um array
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($dados);
    echo "> Recebendo atraves de um array <hr>"; #linha para separar
    echo "Nome do cliente: " .$dados['nome_cliente']. "<br>";
    echo "E-mail do cliente: " .$dados['email_cliente']. "<br>";
    
    #C:\wamp64\bin\php\php7.4.9\php.exe

?>

