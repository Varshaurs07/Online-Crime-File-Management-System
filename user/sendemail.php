<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/Exception.php";
require "../PHPMailer/src/SMTP.php";

require "../config/database.php";

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = mysqli_real_escape_string($link, trim($_POST['email']));

    $query = "select * from crime_2023_user where email = '$email'";

    $result = mysqli_query($link, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) 
    {
        $row = mysqli_fetch_array($result);

        $email = $row["email"];
        $name = $row["name"];
        $password = $row["password"];
        $message = "Hello $name, <br>
        Your Password is $password
        ";

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
        $mailer->addAddress($email, $name);
        $mailer->isHTML(true);
        $mailer->Subject = 'FORGOT PASSWORD';
        $mailer->Body  = $message;
        $result = $mailer->send();

        if ($result === true) 
        {
            $_SESSION["save"] = "yes";
            echo "<script> location.replace('forgotpassword.php') </script>";
        } 
        else 
        {
            $_SESSION["fail"] = "yes";
            echo "<script> location.replace('forgotpassword.php') </script>";
        }
    }
    else
    {
        $_SESSION["dexists"] = "yes";
        echo "<script> location.replace('forgotpassword.php') </script>";
    }


    mysqli_close($link);
}
