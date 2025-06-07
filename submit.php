<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'assets/vendor/PHPMailer-master/src/PHPMailer.php';
require 'assets/vendor/PHPMailer-master/src/SMTP.php';
require 'assets/vendor/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rajinfoyt@gmail.com';
    $mail->Password = 'hlsv lfqm xhlz cstp';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom($_POST["email"]);
    $mail->addAddress('rw.raju@gmail.com');

    $mail->isHTML(false);
    $mail->Subject = 'New message from your website';
    $mail->Body    = "Email: {$_POST["email"]}\nMessage: {$_POST["message"]}";

    $mail->send();
    header("Location: index.html");
    exit;
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
    exit;
}
?>