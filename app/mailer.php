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
    $mail->Host       = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'no-reply@ondiris.kz';                     // SMTP username
    $mail->Password   = 'Glo20Bal19On@)!(';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;      
    $mail->CharSet 	= 'utf-8';                              // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@ondiris.kz', 'Profrem');        
    $mail->addCC("sanch941@gmail.com");                                                 
    $_POST = json_decode(file_get_contents('php://input'), true);   
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    // Content
    $mail->isHTML(true);        
    $mail->Subject = "Заявка - profrem.kz";                              
    $mail->Body	= "$name , $phone";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}