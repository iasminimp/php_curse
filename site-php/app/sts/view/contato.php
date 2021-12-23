<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato - Iasmin</title>
        <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>
    </head>
  
    <body>
        <?php
            #variavel para receber a mensagem PHP de sucesso ou erro
            $msg="";

            //echo 'Hello, from Page CONTATO<br>';
            $query_contact = "SELECT id, title_opening_hours, opening_hours, title_address, address_one, address_two, phone
            FROM sts_contacts
            LIMIT 1";

            $result_contact = mysqli_query($conn, $query_contact);
            $row_contact = mysqli_fetch_assoc($result_contact);
            extract($row_contact);
           /* echo "ID: $id <br>";
            echo "Titulo: $title_opening_hours <br>";
            echo "Atendimento: $opening_hours <br>";
            echo "Titulo do Endereço: $title_address <br>";
            echo "Endereço 1: $address_one <br>";
            echo "Endereço 2: $address_two <br>";
            echo "Telefone: $phone <br><br><hr>"; */  
            
            #conectar com o bd-pra salvar as informações 
            $data=filter_input_array(INPUT_POST, FILTER_DEFAULT);
            #var_dump($data);
            #quando clicar no botao - cadastrar - ira enviar
            if(!empty($data['SendAddMsg'])){ #verifica se foi apertado 
                $empty_input=false; /*nao tem nenhuma variavel vazia - do formulario */

                //como validar de forma individual
               /* if (empty($data['name'])){ //mensagem de erro de preenchimento para o nome 
                    $empty_input = true;
                    echo "<p style='color:#f00;'> Preencha o campo nome!</p>";
                }elseif(empty($data['email'])){ //mensagem de erro de preenchimento no e-mail
                    $empty_input = true;
                    echo"<p style='color: #f00;'>Preencha o campo e-mail!</p>";
                }elseif(empty($data['subject'])){ //mensagem de erro de preenchimento no assunto 
                        $empty_input = true;
                        echo"<p style='color: #f00;'>Preencha o campo assunto!</p>";
                }elseif (empty($data['content'])){//mensagem de erro para preencher o campo de mensagem 
                    $empty_input=true;
                    echo "<p style='color: #f00;'>Preencha o campo de Mensagem!</p>";
                } */               
                
                //Validar todos os campos ao mesmo tempo - atraves do array
                $data=array_map('trim', $data);
                if(in_array("", $data)){
                    $empty_input=true;
                    $msg="<div class='alert alert-danger' role='alert'>Preencha todos os campos!</div>";
                }elseif (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){//validação do email - via php
                    $empty_input=true;
                    $msg= "<div class='alert alert-danger' role='alert'>Preencha o campo com e-mail válido!</div>";
                }
                if(!$empty_input){
                    $query_cont_msg ="INSERT INTO sts_contacts_msgs (name, email, subject, content, created) VALUES ('".$data['name']."', '".$data['email']."', '".$data['subject']."', '".$data['content']."', NOW())";
                    mysqli_query ($conn, $query_cont_msg);
                    if(mysqli_insert_id($conn)){
                        $msg= "<div class='alert alert-success' role='alert'>Mensagem de contato enviada com sucesso!</div> <br>";
                        unset($data); //para destruir os dados que estao no formulario - caso seja enviado com sucesso
                    }else{
                        $msg= "<div class='alert alert-danger' role='alert'>Erro: Mensagem de contato não enviada com sucesso! </div><br>";
                    }
                }
            }

        ?>

<div class="jumbotron contato">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-6 mb-4">
                <?php
                    #verificação se a variavel existe para impressao da mensagem de erro ou se foi enviada com sucesso - atraves do PHP/JAVA!
                    if(!empty($msg)){
                        echo $msg;
                        unset($msg);
                    } 
                ?>
                <span class="msg"></span> <!-- onde aparecera a mensagem de erro. e qual erro-->
                    <form id="new_contacts_msgs" method="POST" action="">
                        <div class="form-group">
                            <label for="name"> Nome</label>
                            <input name='name' type="text" class="form-control" id="name" placeholder="Nome Completo"
                                autofocus value="<?php
                                    if(isset($data['name'])){
                                        echo $data['name'];
                                    }
                                ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email"> E-mail</label>
                            <input name='email' type="email" class="form-control" id="email"
                                placeholder="exemplo@email.com" value="<?php
                                    if(isset($data['email'])){
                                        echo $data['email'];
                                    }
                                ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="subject"> Assunto</label>
                            <input name='subject' type="text" class="form-control" id="subject"
                                placeholder="Assunto da Mensagem" value="<?php
                                if(isset($data['subject'])){
                                    echo $data['subject'];
                                }
                            ?>"required>
                        </div>

                        <div class="form-group">
                            <label for="content">Mensagem</label>
                            <textarea name='content' class="form-control" id="content" rows='3'
                                placeholder="Conteúdo da Mensagem" required><?php
                                    if(isset($data['content'])){
                                        echo $data['content'];
                                    }
                                ?> </textarea>
                        </div><br>

                        <button type='submit' class='btn btn-primary' value="Cadastrar" name="SendAddMsg">Enviar</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3><?php echo $title_opening_hours;?></h3>
                    <p class='lead'><?php echo $opening_hours;?></p>
                    <hr>
                    <address>
                        <strong><?php echo $title_address;?></strong>
                        <?php echo $address_one . "<br>". $address_two."<br>".$phone."<br>"; ?>
                    
                    </address>
                </div>

            </div>
        </div>
    </div>

<!--
        <h1>Adicionar em Contato</h1>
        <span class="msg"></span>
        <form id="new_contacts_msgs" method="POST" action="">
            <label>Nome</label>
            <input type="text" name="name" id="name" placeholder="Digite seu Nome Completo" autofocus value="
            <#?php
                if(isset($data['name'])){
                    echo $data['name'];
                }
            ?>
            "> <br><br> <!-- colocar o "required" no final, para que seja feita a validação pelo HTML; O "autofocus" é para o cursor ir para o primeiro campo-->
<!--
            <label> E-mail</label>
            <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail" 
            value="<#?php
                if(isset($data['email'])){
                    echo $data['email'];
                }
            ?>"><br><br>   
            
            <label> Assunto</label>
            <input type="text" name="subject" id="subject" placeholder="Digite o asssunto da mensagem" 
            value="<#?php
                if(isset($data['subject'])){
                    echo $data['subject'];
                }
            ?>"><br><br>

            <label>Conteúdo</label>
            <textarea name="content" id="content" rows="4" cols="50" placeholder="Digite o conteúdo da mensagem"><#?php
                if(isset($data['content'])){
                    echo $data['content'];
                }
            ?></textarea><br><br> 

            <input type="submit" value="Cadastrar" name="SendAddMsg"><br><br>
        </form>
            -->
    </body>
    
</html>



