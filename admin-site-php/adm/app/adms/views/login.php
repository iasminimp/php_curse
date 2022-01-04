<?php
    #pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    #criptografia de senhas - pelo php
    #echo password_hash ("123456a",PASSWORD_DEFAULT);

    $msg="";

    #recebendo os dados do formulário
    $data=filter_input_array(INPUT_POST, FILTER_DEFAULT);
    #INPUT_POST =>  Chega pelo metodo post
    #FILTER_DEFAULT => Em formato de array/ string
    var_dump($data); #verificar se esta chegando as informações do formulario

    #validação do formulário
    if(!empty($data['SendLogin'])){ 
        #echo "Validar Login <br>";

        #validando - o preechimento dos campos pelo PHP 
        $empty_input = false;
        $data = array_map('trim', $data); #trim-> tira o espaço em branco

        if(in_array("",$data)){ #se existir algum campo vazio
            $empty_input = true;
            $msg = "<p style='color:#f00'> Necessário preencher todos os campos!<p>";
        }elseif (stristr($data['username'], " ")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida 2!<p>";
        }elseif (stristr($data['password'], "'")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida 2!<p>";
        }elseif (stristr($data['password'], '"')){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida 2!<p>";
        }elseif (stristr($data['password'], " ")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida 2!<p>";
        }

        if (!$empty_input){ 
            #selecionando os dados do bd
            $query_user="SELECT id, name, email, password, adms_sits_user_id
            FROM adms_users
            WHERE email = '".$data['username']."'
            OR username = '".$data['username']."'
            LIMIT 1";#Limitando acesso apenas para um usuário

            $result_user=mysqli_query($conn, $query_user);
            

            if(($result_user) AND ($result_user->num_rows !=0)){#verificando se o usuário existe
                #echo "Usuário encontrado!<br>";
                $row_user = mysqli_fetch_assoc($result_user);
                var_dump($row_user);
                #exemplo de comparação direta -  para bloqueio do login, exemplo mensalidade
                /*if($row_user['adms_sits_user_id']==4){
                    echo "Usuário com mensalidade Atrasada! <br>";
                }*/

                if($row_user['adms_sits_user_id']!=1){ #situação Ativa (1)
                    $msg = "<p style='color:#f00'> Usuário não pode realizar o login <p>";
                }else if(password_verify($data['password'], $row_user['password'])){
                    //echo "Senha Válida! <br>";
                    $url_destination = URLADM."/dashboard";
                    header("Location: $url_destination");
                }else{ 
                    $msg = "<p style='color:#f00'> Usuário ou a senha Inválida!<p>";
                }
                #password_verify($query_user, $hash);
            }else{
                $msg =  "<p style='color:#f00'> Usuário ou a senha Inválida!<p>";
            }
        }
    }
if(!empty($msg)){
    echo $msg;
    unset($msg);
}

?>
<span class="msg"></span>
<form id="send_login" method="POST" action="">
    <label>Usuário</label>
    <input type="text" name="username" id="username" placeholder="Digite o usuário ou e-mail" autofocus ><br><br>

    <label>Senha</label>
    <input type="password" name="password" id="password" placeholder="Digite a senha" > <br><br>

    <input type="submit" name="SendLogin" value="Acessar">
</form>