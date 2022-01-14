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
    
    function sendEmail($email_data, $option_conf_email, $conn){
        var_dump($option_conf_email);
        //var_dump($email_data);#prova real-> se os dados realmente estão sendo recebidos
        //echo "enviar e-mail <br>";

        /*//Load Composer's autoloader
        require './lib/vendor/autoload.php';
*/
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true); #istanciando objeto - mail

        $row_conf_email = confEmail($option_conf_email, $conn);
       // var_dump($row_conf_email); #comprovando se a função (confEmail) esta retornando o valor correto

       extract($row_conf_email); #extraindo os elementos para serem utilizados como variaveis ($username)
        try{
            //Server settings - https://mailtrap.io/inboxes/1512080/messages
             #debug => verificar algum erro no envio do e-mail (não apresentar para o usuário)
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            #debug => verificar algum erro no envio do e-mail (não apresentar para o usuário)
            
            $mail->CharSet = 'UTF-8'; #Setando como linguagem (caracteres especiais, validos)
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = $host_server;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $username;                     //SMTP username
            $mail->Password   = $password;                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->SMTPSecure = $smtpsecure;
            $mail->Port       = $port;

             //Recipients - Destinatário
            $mail->setFrom('iasminimp7@gmail.com', 'Iasmin'); #QUEM esta enviando
            $mail->addAddress($email_data['to_email'], $email_data['to_name']);     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $email_data['subject'];
            $mail->Body    = $email_data['content_html'];
            $mail->AltBody = $email_data['content_text'];

            #metodo para enviar o e-mail
            $mail->send();

            return true;


            //echo 'E-mail enviado com sucesso!<br>';
        } catch (Exception $e) {
            //echo "ERRO: E-mail não pode ser enviado!<br>. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
    
    #conexao com o BD de email de confirmação (adms_confs_emails)
    function confEmail($option_conf_email, $conn){
        //var_dump($conn); #prova real que a $conn esta funcionando corretamente
        $query_conf_email = "SELECT name, email, host_server, username, password, smtpsecure, port
            FROM adms_confs_emails
            WHERE id = $option_conf_email
            LIMIT 1";
        $result_conf_email = mysqli_query($conn, $query_conf_email);
        $row_conf_email = mysqli_fetch_assoc ($result_conf_email);
        //var_dump($row_conf_email); #prova real: comprovando se as informações estão vindo corretamente do BD
        return $row_conf_email; #retorna a linha
    }

?>