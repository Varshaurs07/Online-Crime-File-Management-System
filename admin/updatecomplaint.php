<?php

session_start();

require "../config/database.php";

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['updatecomplaint'])) 
    {
        $state = true;
 
        $uid = mysqli_real_escape_string($link, trim($_POST['updatecomplaint'])); 
        $name = mysqli_real_escape_string($link, trim($_POST['name'])); 
        $police = mysqli_real_escape_string($link, trim($_POST['police'])); 

        // $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);
 
            $query = "update crime_2023_complaint set police = '$police', policename = '$name' where uid = '$uid'";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            } 

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('crimedetails.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('crimedetails.php') </script>";
            }
    } 
    else 
    {
        echo "<script> location.replace('crimedetails.php') </script>";
    }

    mysqli_close($link);
}
