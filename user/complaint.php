<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["user"])) {
    echo "<script> location.replace('index.php') </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ONLINE CRIME FILE MANAGEMENT SYSTEM - User</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

    <style>
        .accordion {
            --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .tagify__input {
            padding: 0.375rem 0.75rem !important;
            margin: 0.100rem !important;
        }

        .form-control {
            box-shadow: none !important;
        }

        .form-select {
            box-shadow: none !important;
        }
    </style>

</head>

<body>

    <div class="d-flex flex-column bg-white min-vh-100">

        <nav class="navbar navbar-expand-lg bg-danger  border-danger-emphasis border-bottom">
            <div class="container-fluid  mx-5">
                <a class="navbar-brand text-white d-flex align-items-center gap-2 fw-bold fs-5" href="#">
                    <i class="fa-solid fa-laptop-file"></i> <span class="d-none d-md-block text-nowrap">ONLINE CRIME FILE MANAGEMENT SYSTEM</span> <span class="d-block d-md-none text-nowrap">OCFMS</span>
                </a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active" aria-current="page" href="complaint.php">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                Add Complaint</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="mycomplaint.php">
                                <i class="fa-solid fa-list-check"></i>
                                Manage Complaints</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="wantedpersons.php">
                            <i class="fa-solid fa-list"></i>
                            Wanted Person List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="missingpersons.php">
                            <i class="fa-solid fa-list"></i>
                            Missing Person List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" href="logout.php">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <?php
        if (isset($_SESSION["fail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                        Complaint Registration Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>



        <?php
        if (isset($_SESSION["save"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Complaint Registered Successfully !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["save"]);
        ?>


        <!-- dhsuyfbwqqizyonx -->

        <div class="container flex-fill d-flex flex-column my-2">


            <div class="d-flex mt-5 mb-5 justify-content-start align-items-center">
                <h3 class="text-danger-emphasis link-offset-1 text-decoration-underline flex-grow-1 flex-md-grow-0">
                    Add Complaint
                </h3>
            </div>


            <div class="row justify-content-center my-2">



                <div class="col-md-12">

                    <form action="savecomplaint.php" method="post" id="savecomplaintform" autocomplete="off">

                        <div class="row justify-content-around g-3">
 

                            <div class="col-md-5 position-relative">
                                <label for="type" class="form-label">Complaint Type:</label>
                                <select name="type" id="type" class="form-control shadow-none border-secondary ">
                                    <option value="">Select Type</option>
                                    <option value="theft">Theft</option>
                                    <option value="accident">Accident</option>
                                    <option value="fraud">Fraud</option>
                                    <option value="robbery">Robbery</option>
                                    <option value="murder">Murder</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="invalid-tooltip rounded-3">
                                    * Select Complaint Type
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="date" class="form-label"> Date:</label>
                                <input type="date" name="date" id="date" class="form-control shadow-none border-secondary" placeholder="Date">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Date
                                </div>
                            </div>

                            <div class="col-md-11 position-relative">
                                <label for="explaination" class="form-label"> Complaint Explaination:</label>
                                <textarea name="explaination" id="explaination" class="form-control shadow-none border-secondary" placeholder="Explaination" rows="4"></textarea>
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Explaination
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="location" class="form-label"> Location:</label>
                                <input type="text" name="location" id="location" class="form-control shadow-none border-secondary" placeholder="Location">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Location
                                </div>
                            </div>


                            <div class="col-md-5 position-relative">
                                <label for="policestation" class="form-label">Nearest Police Station:</label>
                                <select name="policestation" id="policestation" class="form-control shadow-none border-secondary ">
                                    <option value="" hidden selected>Select Police Station</option>
                                    <option value="AIRPORT SECURITY POLICE STATION">AIRPORT SECURITY POLICE STATION</option>
                                    <option value="ALANAHALLI POLICE STATION">ALANAHALLI POLICE STATION</option>
                                    <option value="ASHOKPURAM POLICE STATION">ASHOKPURAM POLICE STATION</option>
                                    <option value="CYBER CRIME POLICE STATION">CYBER CRIME POLICE STATION</option>
                                    <option value="DEVARAJA POLICE STATION">DEVARAJA POLICE STATION</option>
                                    <option value="HEBBAL POLICE STATION">HEBBAL POLICE STATION</option>
                                    <option value="JAYALAKSHMIPURAM POLICE STATION">JAYALAKSHMIPURAM POLICE STATION</option>
                                    <option value="KRISHNARAJA POLICE SATION">KRISHNARAJA POLICE SATION</option>
                                    <option value="KUVEMPUNAGARA POLICE STATION">KUVEMPUNAGARA POLICE STATION</option>
                                    <option value="LASHKAR TRAFFIC POLICE STATION">LASHKAR TRAFFIC POLICE STATION</option>
                                    <option value="LAXMIPURAM POLICE STATION">LAXMIPURAM POLICE STATION</option>
                                    <option value="MANDI POLICE STATION">MANDI POLICE STATION</option>
                                    <option value="METAGALLY POLICE STATION">METAGALLY POLICE STATION</option>
                                    <option value="NARASIMHARAJA POLICE STATION">NARASIMHARAJA POLICE STATION</option>
                                    <option value="NAZARBAD POLICE STATION">NAZARBAD POLICE STATION</option>
                                    <option value="SARSWARTHIPURAM POLICE STATION">SARSWARTHIPURAM POLICE STATION</option>
                                    <option value="SIDDHARTHA TRAFFIC POLICE STATION">SIDDHARTHA TRAFFIC POLICE STATION</option>
                                    <option value="UDAYAGIRI POLICE STATION">UDAYAGIRI POLICE STATION</option>
                                    <option value="VANIVILASA PURAM POLICE STATION">VANIVILASA PURAM POLICE STATION</option>
                                    <option value="VIDYARANYAPURAM POLICE STATION">VIDYARANYAPURAM POLICE STATION</option>
                                    <option value="VIJAYANAGAR POLICE STATION">VIJAYANAGAR POLICE STATION</option>
                                    <option value="WOMEN POLICE STATION">WOMEN POLICE STATION</option>
                                </select>
                                <div class="invalid-tooltip rounded-3">
                                    * Select Nearest Police Station
                                </div>
                            </div>


                            <div class="col-md-5 position-relative">
                                <label for="time" class="form-label"> Time:</label>
                                <input type="time" name="time" id="time" class="form-control shadow-none border-secondary" placeholder="Time">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Time
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="name" class="form-label"> Name:</label>
                                <input type="text" name="name" id="name" class="form-control shadow-none border-secondary" placeholder="Name" value="<?= $_SESSION["username"]; ?>" readonly>
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Name
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="email" class="form-label"> Email:</label>
                                <input type="text" name="email" id="email" class="form-control shadow-none border-secondary" placeholder="Email" value="<?= $_SESSION["user"]; ?>" readonly>
                                <div class="invalid-tooltip rounded-3 alertemail">
                                    * Enter Valid Email
                                </div>
                            </div>

                            <div class="col-md-5">
                                <label for="captcha" class="form-label"> Captcha:</label>
                                <div class="d-flex gap-1 position-relative">
                                    <img src="#" alt="CAPTCHA Image" class="img-fluid" id="captchaimage">
                                    <input type="text" name="captcha" id="captcha" class="form-control shadow-none border-secondary" placeholder="Captcha" onKeyPress="if(this.value.length==6) return false">
                                    <button type="button" id="refresh" class="btn btn-success shadow-none"><i class="fa fa-refresh"></i></button>
                                    <div class="invalid-tooltip rounded-3 alertverify">
                                        * Enter OTP
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="captchacode" id="captchacode" value="">

                            <div class="col-md-11 mt-4">
                                <div class="form-check form-check-inline align-items-start d-flex gap-2 position-relative">
                                    <input class="form-check-input border-secondary shadow-none border-2" type="checkbox" id="certify" value="yes" name="certify">
                                    <label class="form-check-label" for="certify">Declaration: I hereby declare that all the details furnished above are true and correct to the best of my knowledge and belief. In case any of the above information is found to be false or untrue or misleading or misrepresenting, I am aware that I may be held liable for it.</label>
                                    <div class="invalid-tooltip rounded-3">
                                        * Required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 mt-4-5">
                                <button type="reset" id="reset" class="btn btn-danger shadow-none w-100">Reset</button>
                            </div>

                            <div class="col-md-5 mt-4-5">
                                <button type="submit" name="savecomplaint" class="btn btn-primary shadow-none w-100">Submit</button>
                            </div>


                        </div>
                    </form>

                </div>
 

            </div>



        </div>


    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>


    <script>
        $(function() {

            $('#times').prop('disabled', true);

            var rno = Math.floor(100000 + Math.random() * 900000)

            $("#captchaimage").attr("src", "captcha.php?code=" + rno)

            $("#captchacode").val(rno)

            $("#usertable").DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
                ],
            });

            $("#usertable2").DataTable({
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, 'All'],
                ],
            });

            $('.toast').toast('show');


            $("#refresh").on("click", function() {

                var rno = Math.floor(100000 + Math.random() * 900000)

                $("#captchaimage").attr("src", "captcha.php?code=" + rno)

                $("#captchacode").val(rno)

            })


            $("#savecomplaintform").on("submit", function(e) {
                debugger;

                var captchacode = $("#captchacode").val()
                var captcha = $("#captcha").val()
                var type = $("#type").val()
                var date = $("#date").val()
                var time = $("#time").val()
                var email = $("#email").val()
                var name = $("#name").val()
                var type = $("#type").val()
                var explaination = $("#explaination").val()
                var location = $("#location").val()
                var policestation = $("#policestation").val()
                var certify = $("#certify").is(":checked");

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
                    }
                } else {
                    $(".alertemail").text("* Enter Email");
                    $("#email").addClass("is-invalid");
                    e.preventDefault();
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                }

                if (certify == true) {
                    $("#certify").removeClass("is-invalid");
                } else {
                    $("#certify").addClass("is-invalid");
                    e.preventDefault();
                }

                if (date != "") {
                    $("#date").removeClass("is-invalid");
                } else {
                    $("#date").addClass("is-invalid");
                    e.preventDefault();
                }

                if (time != "") {
                    $("#time").removeClass("is-invalid");
                } else {
                    $("#time").addClass("is-invalid");
                    e.preventDefault();
                }

                if (type != "") {
                    $("#type").removeClass("is-invalid");
                } else {
                    $("#type").addClass("is-invalid");
                    e.preventDefault();
                }

                if (explaination != "") {
                    $("#explaination").removeClass("is-invalid");
                } else {
                    $("#explaination").addClass("is-invalid");
                    e.preventDefault();
                }

                if (location != "") {
                    $("#location").removeClass("is-invalid");
                } else {
                    $("#location").addClass("is-invalid");
                    e.preventDefault();
                }

                if (policestation != "") {
                    $("#policestation").removeClass("is-invalid");
                } else {
                    $("#policestation").addClass("is-invalid");
                    e.preventDefault();
                }

                if (captcha != "") {
                    if (captcha != captchacode) {
                        $(".alertverify").text("* Wrong OTP");
                        $("#captcha").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#captcha").removeClass("is-invalid");
                    }
                } else {
                    $(".alertverify").text("* Enter OTP");
                    $("#captcha").addClass("is-invalid");
                    e.preventDefault();
                }


            })


            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

            $("#reset").on("click", function() {
                $("input,textarea,select").removeClass("is-invalid")
                $("#previewImg").attr("src", "");
                $("#previewImg").hide();
                $(".previewrow").hide();
            })

        })
    </script>
</body>

</html>