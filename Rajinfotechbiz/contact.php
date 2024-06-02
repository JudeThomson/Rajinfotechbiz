<?php
require_once 'assets/vendor/autoload.php';

$to = "info@rajinfotechbiz.com";
$subject = "New message from your website";
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$body = "Name: $name\nPhone: $phone\nEmail: $email\nSubject: $subject\nMessage: $message";

$smtpHost = "smtp.gmail.com";
$smtpPort = 587;
$smtpUsername = "judethomsonjt@gmail.com";
$smtpPassword = "llpz govu cjkq ikgw";

$transport = (new Swift_SmtpTransport($smtpHost, $smtpPort, 'tls'))
    ->setUsername($smtpUsername)
    ->setPassword($smtpPassword);

    $mailer = new Swift_Mailer($transport);

$message = (new Swift_Message($subject))
    ->setFrom([$email => 'From Website Contact Page'])
    ->setTo([$to])
    ->setBody($body);

    if ($mailer->send($message)) {
        header("Location: contact-us.html");
        exit;
    } else {
        echo "Error sending email";
        exit;
    }
?>