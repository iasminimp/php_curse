<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once './conexao.php';
echo "<h1>Listar os Usuários </h1>";
#$query_users = "SELECT * FROM users"; #chamando de uma forma geral
$query_users = "SELECT id, nome, email FROM users";
$result_users = mysqli_query($conn,$query_users);

while ($row_user =  mysqli_fetch_assoc($result_users)){
   // var_dump($row_user); #prova real - se esta recebendo/ mostrando os dados do bd
    #Seleciona cada coluna... elemento do DB
    
    /*
    echo "ID: " .$row_user['id']. "<br>";
    echo "Nome: " .$row_user['nome']. "<br>";
    echo "E-mail: ".$row_user['email']."<br>";
    */
    
    #Extract Row, chamando o elemento do BD sem utilizar  $row_user['email'], somente utilizando o nome da variavel/ coluna/ elemento
    extract($row_user);
    echo "ID: ".$id."<br>";
    echo "Nome: ".$nome."<br>";
    echo "E-mail: " .$email. "<br>";       
    echo "<hr>";
}

