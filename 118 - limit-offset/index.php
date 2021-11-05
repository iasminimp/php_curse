<?php
#vincular/ incluir com a conexao.php
include_once './conexao.php';

#selecionando o bd de USERS atribuindo a uma variavel
//$query_users = "SELECT * FROM users"; #metodo nao indicado
#LIMIT -> limita o acesso;
#OFFSET -> número de registros a serem retornados
$query_users = "SELECT id,nome, email FROM users LIMIT 2 OFFSET 3"; #metodo indicado


#executar
$result_users = mysqli_query($conn, $query_users);
#conn =  variavel que possui a conexao com o BD
#tambem pode ser escrita dessa forma:
#mysqli_query($conn, "SELECT * FROM users");

echo "<h1>Listar os usuários </h1>";

while($row_user = mysqli_fetch_assoc($result_users)){
    #var_dump($row_user);
    echo "<br>";
    extract($row_user);
    echo "ID: ".$id."<br>";
    echo "Nome: ".$nome."<br>";
    echo "E-mail: ".$email."<br>";
    echo "<hr>";    
}