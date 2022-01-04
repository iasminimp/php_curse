<?php
    
    #pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    $host = HOST;
    $user = USER;
    $password = PASS;
    $dbname=DBNAME;
    $port= PORT;

    $conn = mysqli_connect($host.":". $port,$user,$password, $dbname);

    if($conn){
        //echo "Conexão realizada com sucesso (DataBase) <br>";
    }else{
        die("Erro: Por favor tente novamente. Caso persista contate pelo e-mail: ".EMAILADM."!<br>");
    }

?>