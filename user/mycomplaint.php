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
                            <a class="nav-link text-white fw-bold" aria-current="page" href="complaint.php">
                                <i class="fa-solid fa-file-circle-plus"></i>
                                Add Complaint</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active" aria-current="page" href="mycomplaint.php">
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


        <!-- dhsuyfbwqqizyonx -->

        <div class="container flex-fill d-flex flex-column my-2">


            <div class="d-flex mt-5 mb-5 justify-content-start align-items-center">
                <h3 class="text-danger-emphasis link-offset-1 text-decoration-underline flex-grow-1 flex-md-grow-0">
                    Manage Complaints
                </h3>
            </div>


            <div class="row justify-content-center my-2">



                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="usertable">
                            <thead class="text-white">
                                <tr class="align-middle text-center text-nowrap table-danger"> 
                                    <th class="dt-head-center">Police Station</th>
                                    <th class="dt-head-center">Type</th>
                                    <th class="dt-head-center">Date</th>
                                    <th class="dt-head-center">Time</th>
                                    <th class="dt-head-center">Location</th>
                                    <th class="dt-head-center">Explanation</th>
                                    <th class="dt-head-center">Status</th>
                                    <th class="dt-head-center">Assigned Police</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "select * from crime_2023_complaint where email = '" . $_SESSION["user"] . "'";
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr class="align-middle text-center"> 
                                        <td><?= $row["policestation"] ?></td>
                                        <td><?= $row["type"] ?></td>
                                        <td><?= $row["date"] ?></td>
                                        <td><?= $row["time"] ?></td>
                                        <td><?= $row["location"] ?></td>
                                        <td><?= $row["explanation"] ?></td>
                                        <td><?= $row["status"] ?></td>
                                        <td><?= $row["policename"] == ""?"N/A":$row["policename"] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>



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