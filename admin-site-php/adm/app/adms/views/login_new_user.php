<?php
    #pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    //echo "Cadastrar usuário na página de login <br>";


    $msg=""; #iniciando a variavel com vazio (v=0;)
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    var_dump($data);

    #incluindo o enviar email
    /*include './lib/lib_send_email.php';

    #validação do usuário através de um link de confirmação pelo E-mail
    $email_data['to_email'] = "iasmin@gmail.com";
    $email_data['to_name'] = "Iasmin";
    $email_data['subject'] = "Titulo e-mail dinamico";
    $email_data['content_html']="Conteúdo do e-mail com <b>HTML</b>";
    $email_data['content_text']="Conteúdo somente texto";

    sendEmail($email_data);*/


    #verificando se o formulario esta preenchido corretamente para ir pro bd
    if(!empty($data['AddNewUser'])){
        #var_dump($data);
        #echo $data['id'];
        #VALIDAÇÃO senha - php
        $empty_input = false;
        $data = array_map('trim', $data); #retirando os espaços vazios do vetor/array
        if(in_array("", $data)){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Necessário preencher todos os campos!</p>";
        }elseif(stristr($data['name'], "'")){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Caracter ( ' ) utilizado no campo nome inválido!</p>";
        }elseif(stristr($data['name'], '"')){
            $empty_input = true;
            $msg = '<p style="color: #f00">Erro: Caracter ( " ) utilizado no campo nome inválido!</p>';
        }
        
        elseif(stristr($data['email'], "'")){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Caracter ( ' ) utilizado no campo e-mail inválido!</p>";
        }elseif(stristr($data['email'], '"')){
            $empty_input = true;
            $msg = '<p style="color: #f00">Erro: Caracter ( " ) utilizado no campo e-mail inválido!</p>';
        }elseif(stristr($data['email'], " ")){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Proibido utilizar espaço em branco no campo e-mail!</p>";
        }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: E-mail inválido!</p>";
        }
        
        elseif(stristr($data['password'], "'")){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Caracter ( ' ) utilizado no campo senha inválido!</p>";
        }elseif(stristr($data['password'], '"')){
            $empty_input = true;
            $msg = '<p style="color: #f00">Erro: Caracter ( " ) utilizado no campo senha inválido!</p>';
        }elseif(stristr($data['password'], " ")){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: Proibido utilizar espaço em branco no campo senha!</p>";
        }elseif((strlen($data['password'])) < 6){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: A senha deve ter no mínimo 6 caracteres!</p>";
        }elseif(!preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$/', $data['password'])){
            $empty_input = true;
            $msg = "<p style='color: #f00'>Erro: A senha deve ter letras e números!</p>";
        }



        if(!$empty_input){
            $format_a = '"!@#$%*()+{[}];:,\\\'<>°ºª';
            $format_b = '                            ';
            $data['name'] = strtr($data['name'], $format_a, $format_b); #converte/substitui os caracteres em A para o formato de B (espaço)

            $password_encrypted = password_hash($data['password'], PASSWORD_DEFAULT);#encriptografando a senha
            $conf_email = password_hash($data['password'].date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
            $query_user = "INSERT INTO adms_users (name, email, password, conf_email, created) VALUES ('" . $data['name'] . "', '" . $data['email'] . "', '$password_encrypted', '$conf_email', NOW())";
            mysqli_query($conn, $query_user); #executando a query
            if(mysqli_insert_id($conn)){

                #função que separa só o primeiro nome cadastrado pelo usuário
                $name = explode(" ", $data['name']); #explode -> converte uma string em array
                $first_name = $name[0]; #pegando o nome na primeira posição do vetor (0)

                #incluindo o enviar email
                include './lib/lib_send_email.php';

                #validação do usuário através de um link de confirmação pelo E-mail
                $email_data['to_email'] = $data['email'];
                $email_data['to_name'] = $data['name'];

                $url = URLADM. "/conf-email?key= ". $conf_email;

                $email_data['subject'] = "Confirmação de Conta";
                $email_data['content_html']="Prezado(a) $first_name <br><br>";
                $email_data['content_html'].="Agradecemos a sua solicitação de cadastramento em nosso site!<br><br>";
                $email_data['content_html'].= "Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo: <br><br>";
                $email_data['content_html'].="Link: <a href='$url'>$url</a> <br><br>";
                $email_data['content_html'] .= "Esta mensagem foi enviada a você pela empresa XXX.<br>Você está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.<br><br>";
                
                $email_data['content_text']="Prezado(a) $first_name \n\n";
                $email_data['content_text'].="Agradecemos a sua solicitação de cadastramento em nosso site!\n\n";
                $email_data['content_text'].="Para que possamos liberar o seu cadastro em nosso sistema, solicitamos a confirmação do e-mail clicanco no link abaixo ou cole o link no navegador: \n\n";
                $email_data['content_text'].="Link: $url\n\n";
                $email_data['content_text'] .= "Esta mensagem foi enviada a você pela empresa XXX.\nVocê está recebendo porque está cadastrado no banco de dados da empresa XXX. Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.\n\n";

                
                #verificação - true or false: para enviar
                
                if (sendEmail($email_data, 2, $conn)){
                    $msg="<p style='color:green'>Usuário cadastrado com sucesso. Necessário acessar a caixa de e-mail para confirmar o e-mail!</p>";
                }else{
                    $msg = "<p style='color: #f00'>Usuário cadastrado com sucesso. Houve erro ao enviar o e-mail de confirmação, entre em contato com ". EMAILADM. " para mais informações!</p>";
                }

                //$msg="<p style='color:green'>Cadastro realizado com sucesso</p>";
            }else{
                $msg = "<p style='color: #f00'>Erro: Cadastrado não realizado com sucesso</p>";
            }
        }
        
    }

?>

<h1>Novo Usuário</h1>
<?php
    if(!empty($msg)){
        echo $msg;
        unset ($msg);
    }
?>
<span class="msg"> </span>
<form id="login_new_user" method="POST" action="">
    <label>Nome <span style='color: #f00'>*</span>:</label>
    <input type="text" name="name" id="name" placeholder="Digite o nome completo" autofocus required ><br><br>
    <label>E-mail<span style='color: #f00'>*</span>:</label>
    <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail" required><br><br>
    <label>Senha<span style='color: #f00'>*</span>:</label>
    <input type="password" name="password" id="password" placeholder="Digite a senha" onkeyup="passwordStrength()" required >
    <span id="msgviewStrength"></span><br>

    <p style="margin-top: 5px; font-size: 13px;">
        <span style='color: #f00'>*</span>:Campo Obrigatório 
    </p>

    <input type="submit" value="Cadastrar" name="AddNewUser">
</form>

<p>
    <a href="<?php echo URLADM.'/login';?>">Clique aqui</a> para acessar.
</p>