<?php

require 'assets/vendor/autoload.php';

$to = "info@rajinfotechbiz.com";
$subject = "New message from your website";
$email = $_POST["email"];
$message = $_POST["message"];
$headers = "From: $email";
$body = "Email: $email\nMessage: $message";

$smtpHost = "smtp.gmail.com";
$smtpPort = 587;
$smtpUsername = "judethomsonjt@gmail.com";
$smtpPassword = "llpz govu cjkq ikgw";

$transport = (new Swift_SmtpTransport($smtpHost, $smtpPort, 'tls'))
    ->setUsername($smtpUsername)
    ->setPassword($smtpPassword);

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message($subject))
    ->setFrom([$email => 'Your Name'])
    ->setTo([$to])
    ->setBody($body);

if ($mailer->send($message)) {
    header("Location: index.html");
    exit;
} else {
    echo "Error sending email";
    exit;
}
?>
