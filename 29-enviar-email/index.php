<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        #php orientado a objeto
        
        #https://github.com/PHPMailer/PHPMailer
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        #echo"Enviar e-mail <br>";
        require './lib/vendor/autoload.php';

        $mail = new PHPMailer(true); #objeto, com a Class PHPMailer
        try {
            //Server settings #Servidor fake utilizado/ (o site: mailtrap )
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->Charset='UTF-8';
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'e3860a258d5fd9';                     //SMTP username
            $mail->Password = '75093fde25ce3c';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
            //Recipients
            $mail->setFrom('iasmin@iasmin.com.br', 'Iasmin');           //Quem ta enviando
            $mail->addAddress('celke@email.com.br', 'Celke');           //Add a recipient, com o nome
            #$mail->addAddress('celke@email.com.br');                  //Name is optional, sem o nome
            /*
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
             */
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Título do e-mail';
            $mail->Body    = 'Conteúdo do e-mail em  <b>HTML</b>';
            $mail->AltBody = 'Conteúdo do e-mail somente texto';
            
            
            $mail->send(); #enviando pelo metodo send


            echo 'Menssagem enviada com sucesso!';
        } catch (Exception $e) {
            echo "Menssagem não enviada com sucesso. Mailer Error: {$mail->ErrorInfo}";
        }
        ?>
    </body>
</html>

