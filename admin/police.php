<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["admin"])) {
    echo "<script> location.replace('index.php') </script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE CRIME FILE MANAGEMENT SYSTEM - Admin</title>
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
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active" aria-current="page" href="police.php">
                            <i class="fa-solid fa-user-plus"></i>
                                Add Police</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold " aria-current="page" href="managepolice.php">
                                <i class="fa-solid fa-user-tie"></i>
                                Manage Police</a>
                        </li> 

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold " aria-current="page" href="crimedetails.php">
                                <i class="fa-solid fa-list"></i>
                                Crime Details</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold " aria-current="page" href="report.php">
                            <i class="fa-solid fa-list-check"></i>
                                Report</a>
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
        if (isset($_SESSION["exists"])) {
        ?>

            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Police already exists !
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
        if (isset($_SESSION["fail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Police Created Failed !
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
                            Police Created Successfully !
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
        if (isset($_SESSION["dfail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Police Delete Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["dfail"]);
        ?>



        <?php
        if (isset($_SESSION["dsave"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Police Deleted Successfully !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["dsave"]);
        ?>


        <!-- dhsuyfbwqqizyonx -->

        <div class="container flex-fill d-flex flex-column mt-2 mb-4">


            <div class="d-flex mt-5 mb-5 justify-content-start align-items-center">
                <h3 class="text-danger-emphasis link-offset-1 text-decoration-underline flex-grow-1 flex-md-grow-0">
                    All Police
                </h3>
            </div>


            <div class="row justify-content-center my-2">



                <div class="col-md-12">

                    <form action="savepolice.php" method="post" id="savepoliceform" autocomplete="off">

                        <div class="row justify-content-around g-3">


                            <div class="col-md-5 position-relative">
                                <label for="uid" class="form-label"> Police ID:</label>
                                <input type="text" name="uid" id="uid" class="form-control shadow-none border-secondary  bg-secondary-subtle" placeholder=" ID" value="<?= "uid_" . substr(bin2hex(random_bytes(10)), 0, 10) ?>" readonly>
                                <div class="invalid-tooltip rounded-3">
                                    * Enter ID
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="name" class="form-label"> Name:</label>
                                <input type="text" name="name" id="name" class="form-control shadow-none border-secondary " placeholder=" Name">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Name
                                </div>
                            </div>
                            

                            <div class="col-md-5 position-relative">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="gender" class="form-control shadow-none border-secondary">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="invalid-tooltip rounded-3">
                                    * Select Gender
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="stationname" class="form-label"> Station Name:</label> 
                                <select name="stationname" id="stationname" class="form-control shadow-none border-secondary ">
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
                                    * Enter Station Name
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="designation" class="form-label">Designation:</label>
                                <select name="designation" id="designation" class="form-control shadow-none border-secondary">
                                    <option value="">Select Designation</option> 
                                    <option value="constable">Constable</option> 
                                    <option value="head constable">Head Constable</option> 
                                    <option value="asi">ASI</option> 
                                    <option value="si">SI</option> 
                                    <option value="inspector">Inspector</option> 
                                </select>
                                <div class="invalid-tooltip rounded-3">
                                    * Select Designation
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="email" class="form-label"> Email:</label>
                                <input type="text" name="email" id="email" class="form-control shadow-none border-secondary " placeholder=" Email">
                                <div class="invalid-tooltip rounded-3 alertemail">
                                    * Enter Valid Email
                                </div>
                            </div>


                            <div class="col-md-5 position-relative">
                                <label for="password" class="form-label">Password:</label>
                                <input type="text" name="password" id="password" class="form-control shadow-none border-secondary" placeholder="Password">
                                <div class="invalid-tooltip rounded-3">
                                    * Enter Password
                                </div>
                            </div>

                            <div class="col-md-5 position-relative">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" name="phone" id="phone" class="form-control shadow-none border-secondary" placeholder="Phone">
                                <div class="invalid-tooltip rounded-3 alertphone">
                                    * Enter Valid Phone
                                </div>
                            </div> 


                            <div class="col-md-5 mt-4-5">
                                <button type="reset" id="reset" class="btn btn-danger shadow-none w-100">Reset</button>
                            </div>

                            <div class="col-md-5 mt-4-5">
                                <button type="submit" name="savepolice" value="<?= $row["uid"]; ?>" class="btn btn-primary shadow-none w-100">Submit</button>
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


            $("#room").on("change", function() {
                // debugger;
                type = $("#room option:selected").attr("type");
                typetext = $("#room option:selected").attr("typetext");
                roomno = $("#room option:selected").attr("roomno");
                $("#type").val(type);
                $("#typetext").val(typetext);
                $("#roomno").val(roomno);
            })



            $("#savepoliceform").on("submit", function(e) {
                debugger;

                var id = $("#id").val()
                var name = $("#name").val()
                var email = $("#email").val()
                var password = $("#password").val()
                var phone = $("#phone").val()
                var gender = $("#gender").val()
                var stationname = $("#stationname").val()
                var designation = $("#designation").val()

                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");
                var testusn = new RegExp("(?=(.*[a-zA-Z])(?=.*[0-9]))");


                if (id != "") {
                    $("#id").removeClass("is-invalid");
                } else {
                    $("#id").addClass("is-invalid");
                    e.preventDefault();
                }

                if (name != "") {
                    $("#name").removeClass("is-invalid");
                } else {
                    $("#name").addClass("is-invalid");
                    e.preventDefault();
                }

                if (password != "") {
                    $("#password").removeClass("is-invalid");
                } else {
                    $("#password").addClass("is-invalid");
                    e.preventDefault();
                }

                if (gender != "") {
                    $("#gender").removeClass("is-invalid");
                } else {
                    $("#gender").addClass("is-invalid");
                    e.preventDefault();
                } 

                if (stationname != "") {
                    $("#stationname").removeClass("is-invalid");
                } else {
                    $("#stationname").addClass("is-invalid");
                    e.preventDefault();
                }

                if (designation != "") {
                    $("#designation").removeClass("is-invalid");
                } else {
                    $("#designation").addClass("is-invalid");
                    e.preventDefault();
                }

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