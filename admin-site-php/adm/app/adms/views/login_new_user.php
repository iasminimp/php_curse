<?php
    #pagina Limpar URL - LIB
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    //echo "Cadastrar usuário na página de login <br>";


    $msg=""; #iniciando a variavel com vazio (v=0;)
    $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    #var_dump($data);
    #verificando se o formulario esta preenchido corretamente para ir pro bd
    if(!empty($data['AddNewUser'])){
        #var_dump($data);
        #echo $data['id'];
        $password_encrypted = password_hash($data['password'], PASSWORD_DEFAULT);
        $query_user = "INSERT INTO adms_users (name, email, password, created) VALUES ('" . $data['name'] . "', '" . $data['email'] . "', '$password_encrypted', NOW())";
        mysqli_query($conn, $query_user);#executando a query
        if(mysqli_insert_id($conn)){
            $msg="<p style='color:green'>Cadastro realizado com sucesso</p>";
        }else{
           $msg = "<p style='color: #f00'>Erro: Cadastrado não realizado com sucesso</p>";
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
    <label>Nome</label>
    <input type="text" name="name" id="name" placeholder="Digite o nome completo" autofocus ><br><br>
    <label>E-mail</label>
    <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail" ><br><br>
    <label>Senha</label>
    <input type="password" name="password" id="password" placeholder="Digite a senha" onkeyup="passwordStrength()" >
    <span id="msgviewStrength"></span><br><br>

    <input type="submit" value="Cadastrar" name="AddNewUser">
</form>

<p>
    <a href="<?php echo URLADM.'/login';?>">Clique aqui</a> para acessar.
</p>