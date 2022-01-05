<?php 

#pagina Limpar URL - LIB
if(!defined('R4F5CC')){
    header ("Location: /");#redireciona o usuário para a Raiz
    die("Erro: Página não encontrada! <br>");
}
    echo "Dashboard - Bem Vindo, ".$_SESSION['user_name']."!<br>";
    echo "<a href='".URLADM."/sair'>Sair</a>";

    
?>