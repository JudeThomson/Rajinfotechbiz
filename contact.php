<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'assets/vendor/PHPMailer-master/src/PHPMailer.php';
require 'assets/vendor/PHPMailer-master/src/SMTP.php';
require 'assets/vendor/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$to = "rw.raju@gmail.com";
$subject = "New message from your website";
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$body = "Name: $name\nPhone: $phone\nEmail: $email\nSubject: $subject\nMessage: $message";

$smtpHost = "smtp.gmail.com";
$smtpPort = 587;
$smtpUsername = "rajinfoyt@gmail.com";
$smtpPassword = "hlsv lfqm xhlz cstp";

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $smtpPort;

    // Recipients
    $mail->setFrom($email, 'From Website Contact Page');
    $mail->addAddress($to);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send the email
    if ($mail->send()) {
        header("Location: contact-us.html");
        exit;
    } else {
        echo "Error sending email";
        exit;
    }
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
    exit;
}
?>
