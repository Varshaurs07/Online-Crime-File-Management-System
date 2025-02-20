<?php

require "../config/database.php";

session_start();


if (isset($_SESSION["user"])) {
    echo "<script> location.replace('complaint.php') </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> ONLINE CRIME FILE MANAGEMENT SYSTEM - User Register</title>

    <!-- css imports -->

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.css" />

    <!-- css imports -->

</head>

<body>

    <div class="min-vh-100 d-flex flex-column bg-cover">

        <?php
        if (isset($_SESSION["exists"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            User Already Exists !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["exists"]);
        ?>

        <?php
        if (isset($_SESSION["save"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Registration Success !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>

        <?php
        if (isset($_SESSION["fail"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Registration Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>


        <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
            <div id="liveToast" class="toast bg-success otpsuccess bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body ms-auto text-white">
                        OTP sent successfully !
                    </div>
                    <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
            <div id="liveToast" class="toast optfailure bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body ms-auto text-white">
                        OTP sending failed !
                    </div>
                    <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>


        <div class="container py-5 my-auto">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class="card rounded text-black  border border-danger-subtle shadow-sm">

                        <div class="row g-0">

                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body p-md-5 py-4 mx-md-4 mx-2">

                                    <div class="text-center">
                                        <!-- <img src="../images/user.png" width="80" alt="logo"> -->
                                        <!-- <i class="fa-solid fa-user-group fa-3x text-danger "></i> -->
                                        <h4 class="mb-5 text-decoration-underline link-offset-2 text-danger ">
                                            <i class="fa-solid fa-user-group"></i> User Register
                                        </h4>
                                    </div>

                                    <form method="post" action="saveuser.php" id="userregisterform">


                                        <div class="input-group mb-4 position-relative">
                                            <span class="input-group-text" id="basic-name"><i class="fa-solid fa-user"></i></span>
                                            <input type="text" name="name" id="name" class="form-control shadow-none" placeholder="Name" aria-label="name" aria-describedby="basic-name">
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Enter Name
                                            </div>
                                        </div>

                                        <div class="input-group mb-4 position-relative">
                                            <span class="input-group-text" id="basic-email"><i class="fa-solid fa-at"></i></span>
                                            <input type="text" name="email" id="email" class="form-control shadow-none" placeholder="Email" aria-label="Email" aria-describedby="basic-email">
                                            <div class="invalid-tooltip rounded-3 alertemail">
                                                * Enter Valid Email
                                            </div>
                                        </div>

                                        <div class="input-group mb-4 position-relative">
                                            <span class="input-group-text" id="basic-password"><i class="fa-solid fa-key"></i></span>
                                            <input type="password" name="password" id="password" class="form-control shadow-none" placeholder="Password" aria-label="Password" aria-describedby="basic-password">
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Enter Password
                                            </div>
                                        </div>

                                        <div class="input-group mb-4 position-relative">
                                            <span class="input-group-text" id="basic-phone"><i class="fa-solid fa-phone"></i></span>
                                            <input type="text" name="phone" id="phone" class="form-control shadow-none" placeholder="Phone" aria-label="Phone" aria-describedby="basic-phone">
                                            <div class="invalid-tooltip rounded-3 alertphone">
                                                * Enter Valid Phone
                                            </div>
                                        </div>

                                        <div class="d-flex gap-1">
                                            <div class="input-group mb-4 position-relative">
                                                <span class="input-group-text" id="basic-otp"><i class="fa-solid fa-hashtag"></i></span>
                                                <input type="number" name="otp" id="otp" onKeyPress="if(this.value.length==6) return false" placeholder="OTP Verification - 6 Digits" class="form-control shadow-none rounded-0">
                                                <button type="button" id="generateotp" class="btn btn-sm btn-success">Generate</button>
                                                <div class="invalid-tooltip rounded-3 alertverify">
                                                    * Enter OTP
                                                </div>
                                            </div>
                                        </div>


                                        <input type="hidden" name="otpback" id="otpback" value="">

                                        <div class="input-group mb-4 position-relative">
                                            <span class="input-group-text" id="basic-address"><i class="fa-solid fa-location-dot"></i></span>
                                            <input type="text" name="address" id="address" class="form-control shadow-none" placeholder="Address" aria-label="Address" aria-describedby="basic-address">
                                            <div class="invalid-tooltip rounded-3 ">
                                                * Enter Address
                                            </div>
                                        </div> 


                                        <div class="text-center pt-1 pb-1">
                                            <button class="btn btn-outline-danger  w-100 shadow-none" type="submit" name="saveuser">Register</button>
                                        </div>

                                        <div class="text-center gap-2 pt-4">
                                            <a href="../index.php" class="text-decoration-none btn btn-sm rounded-2 btn-danger ">
                                                <i class="fa-solid fa-house text-white"></i>
                                            </a>
                                            |
                                            <div class="d-inline">
                                                Already have an account?
                                                <a href="index.php" class="text-decoration-none text-white shadow-none rounded-2 btn btn-sm btn-danger ">
                                                    Login
                                                </a>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>




                            <div class="col-md-6 d-none d-md-flex rounded-end">
                                <img src="../images/hero.png" class="img-fluid" style="object-fit:contain;" alt="logo">
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- javascript imports -->

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>

    <!-- javascript imports -->
</body>

<script>
    $(function() {

        $('.toast').not('.otpsuccess').not('.optfailure').toast('show');

        $("#generateotp").on("click", function() {

            var email = $("#email").val()
            var name = $("#name").val()
            var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");

            if (email != "" && testemail.test(email)) {
                $(".alertemail").text("* Enter Valid Email");
                $("#email").removeClass("is-invalid");

                $(this).prop("disabled", true);

                var min = 100000;
                var max = 999999;
                var randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;

                $("#otpback").val(randomNumber);

                $.ajax({
                    type: "POST",
                    url: "../email.php",
                    data: {
                        code: randomNumber,
                        email: $("#email").val(),
                        name: $("#name").val()
                    },
                    success: function(response) {

                        $("#generateotp").prop("disabled", false);
                        
                        if (response == 'false') {
                            $('.optfailure').toast('show')
                        } else {
                            $('.otpsuccess').toast('show')
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#generateotp").prop("disabled", false);
                        $('.otpfailure').toast('show')
                    }
                });

            } else {
                if (email == "") {
                    $(".alertemail").text("* Enter Email");
                    $("#email").addClass("is-invalid");
                }

                if (email != "" && !testemail.test(email)) {
                    $(".alertemail").text("* Enter Valid Email");
                    $("#email").addClass("is-invalid");
                }
            }

        })

        $('#dob').datepicker({
            clearBtn: true,
            format: "yyyy-mm-dd",
            endDate: new Date(new Date().setFullYear(new Date().getFullYear() - 16)).toLocaleDateString('en-CA')
        });

        $("#userregisterform").on("submit", function(e) {
            debugger;

            let phonestat = false;

            var email = $("#email").val()
            var password = $("#password").val()
            var name = $("#name").val()
            var phone = $("#phone").val()
            var address = $("#address").val() 
            var otp = $("#otp").val()
            var otpback = $("#otpback").val()
            var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
            var testphone = new RegExp("^[6-9][0-9]{9}$");
            var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");
            var testusn = new RegExp("(?=(.*[a-zA-Z])(?=.*[0-9]))");

            if (email != "") {
                if (!testemail.test(email)) {
                    $(".alertemail").text("* Enter Valid Email");
                    $("#email").addClass("is-invalid");
                    e.preventDefault();
                } else {
                    $("#email").removeClass("is-invalid");
                    phonestat = true;
                }
            } else {
                $(".alertemail").text("* Enter Email");
                $("#email").addClass("is-invalid");
                e.preventDefault();
            }

            if (phone != "") {
                if (!testphone.test(phone)) {
                    $(".alertphone").text("* Enter Valid Phone");
                    $("#phone").addClass("is-invalid");
                    e.preventDefault();

                } else {
                    $("#phone").removeClass("is-invalid");
                }
            } else {
                $(".alertphone").text("* Enter Phone");
                $("#phone").addClass("is-invalid");
                e.preventDefault();
            }


            if (password != "") {
                $("#password").removeClass("is-invalid");
            } else {
                $("#password").addClass("is-invalid");
                e.preventDefault();
            }

            if (name != "") {
                $("#name").removeClass("is-invalid");
            } else {
                $("#name").addClass("is-invalid");
                e.preventDefault();
            }


            if (address != "") {
                $("#address").removeClass("is-invalid");
            } else {
                $("#address").addClass("is-invalid");
                e.preventDefault();
            } 

            if (phonestat === true) {
                if (otp != "") {
                    if (otp != otpback) {
                        $(".alertverify").text("* Wrong OTP");
                        $("#otp").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#otp").removeClass("is-invalid");
                    }
                } else {
                    $(".alertverify").text("* Enter OTP");
                    $("#otp").addClass("is-invalid");
                    e.preventDefault();
                }
            }

        })

        $("input,textarea,select").on("keydown change", function() {
            $(this).removeClass("is-invalid")
        })

    })
</script>

</html>