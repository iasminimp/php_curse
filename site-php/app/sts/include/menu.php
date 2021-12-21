<?php
   
if(!defined('R4F5CC')){ //limitando acesso ao diretorio
    header("Location: /");//redirecionar para a raiz
    die("Erro: Página não encontrada!");
}
    echo "<a href='".URLSITE."'>Home</a><br>";
    echo "<a href='".URLSITE."/sobre'>Sobre</a><br>";
    echo "<a href='".URLSITE."/contato'>Contato</a><br><hr>";
