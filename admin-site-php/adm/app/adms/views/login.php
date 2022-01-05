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
    //var_dump($data); #verificar se esta chegando as informações do formulario

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
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }elseif (stristr($data['username'], "'")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }elseif (stristr($data['username'], '"')){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }elseif (stristr($data['password'], " ")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }elseif (stristr($data['password'], "'")){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }elseif (stristr($data['password'], '"')){
            $empty_input = true;
            $msg = "<p style='color:#f00'> Usuário ou a senha inválida!<p>";
        }

        if (!$empty_input){ 
            #selecionando os dados do bd
            $query_user="SELECT id, name, nickname, email, password,image, adms_sits_user_id
            FROM adms_users
            WHERE email = '".$data['username']."'
            OR username = '".$data['username']."'
            LIMIT 1";#Limitando acesso apenas para um usuário

            $result_user=mysqli_query($conn, $query_user);
            

            if(($result_user) AND ($result_user->num_rows !=0)){#verificando se o usuário existe
                #echo "Usuário encontrado!<br>";
                $row_user = mysqli_fetch_assoc($result_user);
                //var_dump($row_user);
                #exemplo de comparação direta -  para bloqueio do login, exemplo mensalidade
                /*if($row_user['adms_sits_user_id']==4){
                    echo "Usuário com mensalidade Atrasada! <br>";
                }*/

                if($row_user['adms_sits_user_id']!=1){ #situação Ativa (1)
                    $msg = "<p style='color:#f00'> Usuário não pode realizar o login <p>";
                }else if(password_verify($data['password'], $row_user['password'])){
                    //echo "Senha Válida! <br>";

                    $_SESSION['user_id']=$row_user['id']; #variaveis globais: user_id
                    $_SESSION['user_name']=$row_user['name'];
                    $_SESSION['user_nickname']=$row_user['nickname'];
                    $_SESSION['user_email']=$row_user['email'];
                    $_SESSION['user_image']=$row_user['image'];
                    $_SESSION['user_key']=password_hash($row_user['id'],PASSWORD_DEFAULT); #encriptografando o id


                    unset($data);#Destruindo os dados apos a validação (no formulário - ref a validação  do php)
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

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<h1>Área Restrita</h1>
<span class="msg"></span>
<form id="send_login" method="POST" action="">
    <label>Usuário</label>
    <input type="text" name="username" id="username" placeholder="Digite o usuário ou e-mail"  value="<?php 
        #verificação para q os dados permaneçam no formulário
        if(isset($data['username'])){
            echo $data['username'];
        }
    ?>" autofocus required ><br><br>

    <label>Senha</label>
    <input type="password" name="password" id="password" placeholder="Digite a senha" required > <br><br>

    <input type="submit" name="SendLogin" value="Acessar">
</form>

<p>
    Usuário: iasmin@email.com <br>
    Senha: 123456a
</p>