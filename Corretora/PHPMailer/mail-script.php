<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $myAwardSpaceEmail = "emailtestevesentini@gmail.com";
    $myAwardSpaceEmailPassword = "testeteste";
    $myPersonalEmail = "guilherme1992@hotmail.com";

    require './src/Exception.php';
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    if(isset($_POST['submit'])) {

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 0;

        $mail->Host = 'smtp.mboxhosting.com';
        $mail->SMTPAuth = true;
        $mail->Username = $myAwardSpaceEmail;
        $mail->Password = $myAwardSpaceEmailPassword;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($myAwardSpaceEmail, 'Mailer');
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
        
    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Teste PHPMailer</title>
  </head>
  <body>

    <div class="container">


    <h1>Get in Touch!</h1>
    
    <div id="error"></div>

    <form method="POST" action="mail-script.php">

      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="subject">Subject</label> 
        <input type="text" class="form-control" name="subject" id="subject">   
      </div>
      <div class="form-group">
        <label for="content">What would you like to ask us?</label>
        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
      </div>
      <button type="submit" id="submit"  class="btn btn-primary">Send Email</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script type="text/javascript">

        $("form").submit(function (e) {

       
        var error ="";

        if ($("#email").val() == "") {

        error += "<p> The email field is required.</p>";

        }

        if ($("#subject").val() == "") {

            error += "<p> The subject field is required.</p>";

        }
        if ($("#content").val() == "") {

        error += "<p> The content field is required.</p>";

        }

        if (error != "") {

        $("#error").html('<div class="alert alert-danger" role="alert">The were error(s) in your form:' + error +' </div>');

            return false;

        } else {

           return true;

        }

        });

    </script>  
  </body>
</html>