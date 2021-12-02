<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Iasmin - Formulario contato</title>
    </head>
    <body>
        <h2>Contato</h2>
        <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


        if (!empty($dados['SendAddMsg'])) {//verifica se clicou no botão
            var_dump($dados);
            include_once './conexao.php';

            $query_msgs = "INSERT INTO contacts_msgs (name, email, subject, content, created) VALUES ('" . $dados['name'] . "', '" . $dados['email'] . "', '" . $dados['subject'] . "', '" . $dados['content'] . "', NOW())";
            mysqli_query($conn, $query_msgs);

            if (mysqli_insert_id($conn)) {
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->CharSet = "UTF-8";
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'e3860a258d5fd9';
                    $mail->Password = '75093fde25ce3c';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 2525;

                    //Enviar e-mail para o cliente
                    $mail->setFrom('iasmin@gmail.com', 'Atendimento');
                    $mail->addAddress($dados['email'], $dados['name']);

                    $mail->isHTML(true);
                    $mail->Subject = 'Recebi a mensagem de contato';
                    $mail->Body = "Prezado(a) " . $dados['name'] . "<br><br>Recebi o seu e-mail.<br>Será lido o mais rápido possível.<br>Em breve será respondido.<br><br>Assunto: " . $dados['subject'] . "<br>Conteúdo: " . $dados['content'];
                    $mail->AltBody = "Prezado(a) " . $dados['name'] . "\n\nRecebi o seu e-mail.\nSerá lido o mais rápido possível.\nEm breve será respondido.\n\nAssunto: " . $dados['subject'] . "\nConteúdo: " . $dados['content'];

                    $mail->send();
                    
                    $mail->clearAddresses();
                    
                    //Enviar e-mail para o colaborado
                    $mail->setFrom('iasmin@gmail.com', 'Atendimento');
                    $mail->addAddress("iasmin@gmail.com", "Kelly");

                    $mail->isHTML(true);
                    $mail->Subject = $dados['subject'];
                    $mail->Body = "Nome: " . $dados['name'] . "<br>E-mail: ".$dados['email']."<br>Assunto: " . $dados['subject'] . "<br>Conteúdo: " . $dados['content'];
                    $mail->AltBody = "Nome: " . $dados['name'] . "\nE-mail: ".$dados['email']."\nAssunto: " . $dados['subject'] . "\nConteúdo: " . $dados['content'];

                    $mail->send();

                    echo "Mensagem enviada com sucesso!<br>";
                    unset($dados);
                } catch (Exception $ex) {
                    echo "Erro: Mensagem não enviada com sucesso!<br>";
                }
            } else {
                echo "Erro: Mensagem não enviada com sucesso!<br>";
            }
        }
        ?>

        <form method="POST" action=""> <!-- formulário -->
            <label>Nome: </label>
            <input type="text" name="name" placeholder="Nome completo" value="<?php
            if (isset($dados['name'])) {
                echo $dados['name'];
            }
            ?>" ><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="O melhor e-mail" value="<?php
            if (isset($dados['email'])) {
                echo $dados['email'];
            }
            ?>"><br><br>

            <label>Assunto: </label>
            <input type="text" name="subject" placeholder="Assunto da mensagem" value="<?php
            if (isset($dados['subject'])) {
                echo $dados['subject'];
            }
            ?>"><br><br>

            <label>Conteúdo: </label>
            <input type="text" name="content" placeholder="Conteúdo da mensagem" value="<?php
            if (isset($dados['content'])) {
                echo $dados['content'];
            }
            ?>"><br><br>

            <input type="submit" value="Enviar" name="SendAddMsg">
        </form>
    </body>
</html>
