<?php
 
require "../config/database.php";
 
session_start(); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));

       
        if ($email == "admin@admin.com" && $password == "admin") 
        {
            $_SESSION["admin"] = "admin@admin.com";
            $_SESSION["adminname"] = "admin";
            echo "<script> location.replace('police.php') </script>";
        } 
        else 
        {
            $_SESSION["fail"] = "yes";
            echo "<script> location.replace('index.php') </script>";
        } 
 
    mysqli_close($link);
}
else 
{
    echo "<script> location.replace('index.php') </script>";
}
