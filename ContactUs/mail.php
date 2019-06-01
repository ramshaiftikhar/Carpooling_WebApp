<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$name = $_POST['name'];
$body = $_POST['suggestions'];
$customer_email = $_POST['email'];
$mobile = $_POST['phoneNo'];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom(yourEmail, yourName);

    $mail->addAddress(recipientsEmail);     
    // Add a recipient
    // $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC(addEmail);
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Suggestion Received';
    $mail->Body    = nl2br("Customer Name: ".$name."\nCustomer Email: ".$customer_email."\nCustomer Mobile: ".$mobile."\n"."Suggestion: \n".$body);
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('location: http://localhost:8888/carpool1/index.php');
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
