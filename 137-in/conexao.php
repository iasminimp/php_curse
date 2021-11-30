<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$host = "localhost"; #servidor, nome do servidor
$user = "root";
$password="";
$dbname="celke";
$port=3306; #porta utilizada do banco de dados

$conn = mysqli_connect($host.":".$port, $user, $password,$dbname);
if($conn){
    //echo "Conexão realizada com sucesso!";
    
}else{
    die("Falha na conexão: ".mysqli_connect_error());
}
        
?>     