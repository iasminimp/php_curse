<?php 

    if(!defined('R4F5CC')){#pagina Limpar URL - LIB
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_nickname'], $_SESSION['user_email'], $_SESSION['user_image'], $_SESSION['user_key']);

    $_SESSION['msg']="<p style='color: green'> Deslogado com sucesso!</p>";
    $url_destination = URLADM."/login"; #criando o caminho para q a pagina seja redirecionada
    header("Location: $url_destination");




?>