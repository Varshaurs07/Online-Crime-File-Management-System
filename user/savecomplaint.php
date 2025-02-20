<?php

session_start();

require "../config/database.php";

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['savecomplaint'])) 
    {
        $state = true;
 
        $name = mysqli_real_escape_string($link, trim($_POST['name'])); 
        $email = mysqli_real_escape_string($link, trim($_POST['email'])); 
        $type = mysqli_real_escape_string($link, trim($_POST['type'])); 
        $date = mysqli_real_escape_string($link, trim($_POST['date'])); 
        $time = mysqli_real_escape_string($link, trim($_POST['time'])); 
        $location = mysqli_real_escape_string($link, trim($_POST['location'])); 
        $policestation = mysqli_real_escape_string($link, trim($_POST['policestation'])); 
        $explaination = mysqli_real_escape_string($link, trim($_POST['explaination'])); 
        $certify = mysqli_real_escape_string($link, trim($_POST['certify'])); 

        $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);
 
            $query = " insert into crime_2023_complaint (uid,name,email,type,date,time,location,policestation,explanation,certify,status) values ('$uid','$name','$email','$type','$date','$time','$location','$policestation','$explaination','$certify','open') ";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            } 

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('complaint.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('complaint.php') </script>";
            }
    } 
    else 
    {
        echo "<script> location.replace('complaint.php') </script>";
    }

    mysqli_close($link);
}
