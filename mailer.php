<?php include 'includes/ewp.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$sbj = $_POST['sbj'];
$msg = $_POST['msg'];
$alt_msg = $_POST['alt_msg'];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'dustale@gmail.com';                 // SMTP username
    $mail->Password = 'l@n5yd18';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('dustale@gmail.com', 'LeaVirtual');
    $mail->addAddress('dustin@theoht.com', 'Dustin Scott Garza');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('dustin@theoht.com', 'Information');
    //$mail->addCC('dustin@theoht.com');
    //$mail->addBCC('dustin@theoht.com');

    //Attachments
/*
    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $sbj;
    $mail->Body    = $msg;
    $mail->AltBody = $alt_msg;

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}