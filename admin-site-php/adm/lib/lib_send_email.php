<?php
#auxilio do github: https://github.com/PHPMailer/PHPMailer

#pagina - enviar um e-mail através do PHP
    
    #VALIDAÇÃO, só acessa se passou pela INDEX
    if(!defined('R4F5CC')){
        header ("Location: /");#redireciona o usuário para a Raiz
        die("Erro: Página não encontrada! <br>");
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require './lib/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    #$mail = new PHPMailer(true); #istanciando objeto - mail
    
    function sendEmail(){
        //echo "enviar e-mail <br>";

        /*//Load Composer's autoloader
        require './lib/vendor/autoload.php';
*/
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true); #istanciando objeto - mail

        try{
            //Server settings - https://mailtrap.io/inboxes/1512080/messages
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'e3860a258d5fd9';                     //SMTP username
            $mail->Password   = '75093fde25ce3c';                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 2525;

             //Recipients - Destinatário
            $mail->setFrom('iasminimp7@gmail.com', 'Iasmin');
            $mail->addAddress('atendimento@iasmin.com.br', 'Atendimento');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Título do E-mail';
            $mail->Body    = 'Conteúdo do e-mail com <b>HTML!</b>';
            $mail->AltBody = 'Conteúdo somente Texto';

            #metodo para enviar o e-mail
            $mail->send();


            echo 'E-mail enviado com sucesso!<br>';
        } catch (Exception $e) {
            echo "ERRO: E-mail não pode ser enviado!<br>. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    



?>