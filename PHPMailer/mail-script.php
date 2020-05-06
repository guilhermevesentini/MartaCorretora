<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



    $myEmail = "emailtestevesentini@gmail.com";
    $myPassword = "testeteste";
    $myPersonalEmail = "guilherme1992@hotmail.com";
    $successmessage = "Muito Obrigado, Logo entraremos em Contato."

    require './src/Exception.php';
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    if(isset($_POST['submit'])) {

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;
        $mail->Password = $myPassword;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($myEmail, 'Marta Corretora');
        $mail->addAddress($myPersonalEmail);
        $mail->addReplyTo($_POST['email'], $_POST['name']);

        $mail->isHTML(true);    
        $mail->Subject = $_POST['subject'];
        $mail->Body = $_POST['message'];

        try {
            $mail->send();
            echo 'Your message was sent successfully!';
        } catch (Exception $e) {
            echo "Your message could not be sent! PHPMailer Error: {$mail->ErrorInfo}";
          }
          } else {
            echo "There is a problem with the contact.html document!";
          }

?>
