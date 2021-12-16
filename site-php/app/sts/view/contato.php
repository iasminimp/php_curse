<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contato - Iasmin</title>
        <link rel='icon' href='app/sts/assets/images/icon/favicon.ico'>
    </head>
  
    <body>
        <?php
            //echo 'Hello, from Page CONTATO<br>';
            $query_contact = "SELECT id, title_opening_hours, opening_hours, title_address, address_one, address_two, phone
            FROM sts_contacts
            LIMIT 1";

            $result_contact = mysqli_query($conn, $query_contact);
            $row_contact = mysqli_fetch_assoc($result_contact);
            extract($row_contact);
            echo "ID: $id <br>";
            echo "Titulo: $title_opening_hours <br>";
            echo "Atendimento: $opening_hours <br>";
            echo "Titulo do Endereço: $title_address <br>";
            echo "Endereço 1: $address_one <br>";
            echo "Endereço 2: $address_two <br>";
            echo "Telefone: $phone <br><br><hr>";   
            
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
                    echo "<p style='color:#f00;'>Preencha todos os campos!</p>";
                }elseif (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){//validação do email - via php
                    $empty_input=true;
                    echo "<p style='color:#f00;'>Preencha o campo com e-mail válido!</p>";
                }
                if(!$empty_input){
                    $query_cont_msg ="INSERT INTO sts_contacts_msgs (name, email, subject, content, created) VALUES ('".$data['name']."', '".$data['email']."', '".$data['subject']."', '".$data['content']."', NOW())";
                    mysqli_query ($conn, $query_cont_msg);
                    if(mysqli_insert_id($conn)){
                        echo "<p style='color: green;'>Mensagem de contato enviada com sucesso!</p> <br>";
                    }else{
                        echo "<p style='color: #f00'>Erro: Mensagem de contato não enviada com sucesso! </p><br>";
                    }
                }
            }

        ?>


        <h1>Adicionar em Contato</h1>

        <form id="new_contacts_msgs" method="POST" action="">
            <label>Nome</label>
            <input type="text" name="name" id="name" placeholder="Digite seu Nome Completo" autofocus> <br><br> <!-- colocar o "required" no final, para que seja feita a validação pelo HTML; O "autofocus" é para o cursor ir para o primeiro campo-->

            <label> E-mail</label>
            <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail"><br><br>   
            
            <label> Assunto</label>
            <input type="text" name="subject" id="subject" placeholder="Digite o asssunto da mensagem" ><br><br> 

            <label>Conteúdo</label>
            <textarea name="content" id="content" rows="4" cols="50" placeholder="Digite o conteúdo da mensagem" ></textarea><br><br> 

            <input type="submit" value="Cadastrar" name="SendAddMsg"><br><br>
        </form>
    </body>
    
</html>



