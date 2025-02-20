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
    if (isset($_POST['updatewantedperson'])) 
    {
        $state = true;
 
        $uid = mysqli_real_escape_string($link, trim($_POST['updatewantedperson'])); 
        $location = mysqli_real_escape_string($link, trim($_POST['location'])); 
        $date = mysqli_real_escape_string($link, trim($_POST['date'])); 
        $time = mysqli_real_escape_string($link, trim($_POST['time'])); 
        $user = mysqli_real_escape_string($link, trim($_SESSION['user']));  
        $username = mysqli_real_escape_string($link, trim($_SESSION['username']));  

        // $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);
 
            $query = "update crime_2023_wantedperson set notifylocation = '$location', notifydate = '$date', notifytime = '$time', notifyuser = '$user', notifyusername = '$username', status = 'closed' where uid = '$uid'";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            } 
            

            $querywanted = "select * from crime_2023_wantedperson where uid = '$uid'";
            $resultwanted = mysqli_query($link, $querywanted);
            $rowwanted = mysqli_fetch_array($resultwanted);
            $missingperson = $rowwanted["name"];
            $missingperson = $rowwanted["alias"];

        $queryemail = "select * from crime_2023_police";

        $resultemail = mysqli_query($link, $queryemail);

        while ($rowemail  = mysqli_fetch_array($resultemail)) 
        {
            $email = $rowemail["email"];
            $name = $rowemail["name"];
            $message = "You've received an notification about wanted person $missingperson. alias $missingperson. from $username. <br>
            Location: $location <br>
            Date: $date <br>
            Time: $time <br>
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
            $mailer->addAddress($email, $username);
            $mailer->isHTML(true);
            $mailer->Subject = 'WANTED PERSON NOTIFICATION';
            $mailer->Body  = $message;
            $result = $mailer->send();
        }

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('wantedpersons.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('wantedpersons.php') </script>";
            }
    } 
    else 
    {
        echo "<script> location.replace('wantedpersons.php') </script>";
    }

    mysqli_close($link);
}
