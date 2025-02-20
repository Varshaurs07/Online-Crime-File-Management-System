<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["police"])) {
    echo "<script> location.replace('index.php') </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE CRIME FILE MANAGEMENT SYSTEM - Warden</title>
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
                                <i class="fa-solid fa-list-check"></i>
                                Complaints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="addwantedperson.php">
                                <i class="fa-solid fa-user-plus"></i>
                                Add Wanted Person</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="wantedpersons.php">
                                <i class="fa-solid fa-list"></i>
                                Wanted Person List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active" aria-current="page" href="addmissingperson.php">
                                <i class="fa-solid fa-user-plus"></i>
                                Add Missing Person</a>
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
                            Missing Person Adding Failed !
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
                            Missing Person Added Successfully !
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
                    Add Missing Person
                </h3>
            </div>


            <div class="row justify-content-center my-2">



                <div class="col-md-12">

                    <form action="savemissingperson.php" method="post" id="savemissingpersonform" autocomplete="off" enctype="multipart/form-data">

                        <div class="row justify-content-around g-3">


                            <div class="col-md-5 position-relative">
                                <label for="name" class="form-label"> Name:</label>
                                <input type="text" name="name" id="name" class="form-control shadow-none border-secondary " placeholder=" Name">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Name
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="alias" class="form-label">Alias Name:</label>
                                <input type="text" name="alias" id="alias" class="form-control shadow-none border-secondary " placeholder="Alias Name">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Alias Name
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="missinglocation" class="form-label">Missing Location:</label>
                                <input type="text" name="missinglocation" id="missinglocation" class="form-control shadow-none border-secondary " placeholder="Missing Location">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Missing Location
                                </div>
                            </div>


                            <div class="col-md-5 position-relative">
                                <label for="missingdate" class="form-label">Missing Date:</label>
                                <input type="date" name="missingdate" id="missingdate" class="form-control shadow-none border-secondary " placeholder="Missing Date">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Missing Date
                                </div>
                            </div>


                            <div class="col-md-5 position-relative">
                                <label for="status" class="form-label"> Status:</label>
                                <input type="text" name="status" id="status" class="form-control shadow-none border-secondary " value="open" placeholder=" Status" readonly>
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Status
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="image" class="form-label"> Image:</label>
                                <input type="file" name="image" id="image" class="form-control shadow-none border-secondary " placeholder="Image">
                                <div class="invalid-tooltip rounded-3">
                                    * Select Image
                                </div>
                            </div>

                            
                            <div class="col-md-5 position-relative">
                                <label for="age" class="form-label">Age:</label>
                                <input type="text" name="age" id="age" class="form-control shadow-none border-secondary " placeholder="Age">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Age
                                </div>
                            </div>

                            <div class="col-md-5 mt-4-5">
                                <button type="reset" id="reset" class="btn btn-danger shadow-none w-100">Reset</button>
                            </div>

                            <div class="col-md-5 mt-4-5">
                                <button type="submit" name="savemissingperson" class="btn btn-primary shadow-none w-100">Submit</button>
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


            $("#type").on("change", function() {
                // debugger;
                value = $("#type option:selected").text();
                $("#typetext").val(value);
            })

            $("#savemissingpersonform").on("submit", function(e) {
                debugger;

                var name = $("#name").val()
                var alias = $("#alias").val()
                var missingdate = $("#missingdate").val()
                var missinglocation = $("#missinglocation").val()
                var status = $("#status").val()
                var image = $("#image").val()
                var age = $("#age").val()

                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");
                var testusn = new RegExp("(?=(.*[a-zA-Z])(?=.*[0-9]))");


                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                }

                if (alias != "") {
                    $("#alias").removeClass("is-invalid");
                } else {
                    $("#alias").addClass("is-invalid");
                    e.preventDefault();
                }


                if (missingdate != "") {
                    $("#missingdate").removeClass("is-invalid");
                } else {
                    $("#missingdate").addClass("is-invalid");
                    e.preventDefault();
                }


                if (missinglocation != "") {
                    $("#missinglocation").removeClass("is-invalid");
                } else {
                    $("#missinglocation").addClass("is-invalid");
                    e.preventDefault();
                }


                if (status != "") {
                    $("#status").removeClass("is-invalid");
                } else {
                    $("#status").addClass("is-invalid");
                    e.preventDefault();
                } 

                if (image != "") {
                    $("#image").removeClass("is-invalid");
                } else {
                    $("#image").addClass("is-invalid");
                    e.preventDefault();
                }

                if (age != "") {
                    $("#age").removeClass("is-invalid");
                } else {
                    $("#age").addClass("is-invalid");
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