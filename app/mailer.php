<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

require __DIR__.'/mailer/PHPMailerAutoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'mail.profrem.kz';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'no-reply@profrem.kz';                     // SMTP username
    $mail->Password   = '153624profrem';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 25;      
    $mail->CharSet 	= 'utf-8';                              // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@profrem.kz', 'Profrem');        
    $mail->addCC("sanch941@gmail.com");                                                 
    $_POST = json_decode(file_get_contents('php://input'), true);   
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    // Content
    $mail->isHTML(true);        
    $mail->Subject = "Заявка - profrem.kz";                              
    $mail->Body	= "Имя клиента - $name , Телефон клиента - $phone";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}