<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";

$code = $_POST['code'];
$email = $_POST['email'];
$name = $_POST['name'] == ""? "User": $_POST['name'];
$message = "Your OTP code for registering in ONLINE CRIME FILE MANAGEMENT SYSTEM - $code";
 

$email = $email;
$mailer = new PHPMailer();
$mailer->isSMTP();
$mailer->Host = 'smtp.gmail.com';
$mailer->SMTPAuth = true;
$mailer->Username = 'crimefile9@gmail.com';
$mailer->Password = 'zggouaonyqmncpaw';

$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mailer->Port = 465;
$mailer->setFrom('admin@intrella.com', 'ONLINE CRIME FILE MANAGEMENT SYSTEM');
$mailer->addAddress($email, $username);
$mailer->isHTML(true);
$mailer->Subject = 'OTP FOR REGISTRATION';
$mailer->Body  = $message;
$result = $mailer->send();


if($result === true)
{
    $response = 'true';
}
else
{
    $response = 'false';
} 

echo $response; 
