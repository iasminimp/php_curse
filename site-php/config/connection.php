<?php
#responsavel por fazer a conexão com o Banco de dados do PhpMyAdmin

$host = HOST;
$user = USER;
$password = PASS;
$dbname=DBNAME;
$port=PORT;

$conn=mysqli_connect($host.":".$port, $user, $password, $dbname);

if($conn){ #laço de verificação de conexão com o banco de dados
    #echo "Conexão realizada com sucesso!";
}else{
    die("Falha na conexão: ".mysqli_connect_error().". Se persistir o erro entre em contato pelo e-mail: ".EMAILADM.".<br>");
}


?>