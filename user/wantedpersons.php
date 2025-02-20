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
                            <a class="nav-link text-white fw-bold" aria-current="page" href="mycomplaint.php">
                                <i class="fa-solid fa-list-check"></i>
                                Manage Complaints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active" aria-current="page" href="wantedpersons.php">
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
                        Notification Saved Failed !
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
                            Notification Saved Successfully !
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
                    Wanted Person List
                </h3>
            </div>


            <div class="row justify-content-center my-2">



                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="usertable">
                            <thead class="text-white">
                                <tr class="align-middle text-center text-nowrap table-danger">
                                    <th class="dt-head-center">Name</th>
                                    <th class="dt-head-center">Alias</th>
                                    <th class="dt-head-center">Type</th>
                                    <th class="dt-head-center">Crime Date</th>
                                    <th class="dt-head-center">Status</th>
                                    <th class="dt-head-center">Image</th>
                                    <th class="dt-head-center">Notify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "select * from crime_2023_wantedperson";
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr class="align-middle text-center">
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["alias"] ?></td>
                                        <td><?= $row["type"] ?></td>
                                        <td><?= $row["crimedate"] ?></td>
                                        <td><?= $row["status"] ?></td>
                                        <td><a href="../<?= $row["image"] ?>" target="_blank" class="text-decoration-none btn btn-sm btn-success">View</a></td> 
                                        <?php
                                        if ($row["status"] == "open") {
                                        ?>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#edit<?= $row["uid"] ?>">
                                                    <i class="fa-solid fa-circle-exclamation"></i>
                                                </button>
                                            </td>
                                        <?php
                                        }
                                        else
                                        {
                                            echo "<td>N/A</td>";
                                        }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    
                    <?php
                    $querytask = "SELECT * FROM crime_2023_wantedperson";
                    $resulttask = mysqli_query($link, $querytask);
                    $count = mysqli_num_rows($resulttask);
                    while ($rowtask = mysqli_fetch_array($resulttask)) {
                        if ($rowtask["status"] == "open") {
                    ?>

                            <div class="modal fade" id="edit<?= $rowtask["uid"] ?>" tabindex="-1" aria-labelledby="edit<?= $rowtask["uid"] ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="updatewantedperson.php" method="post" class="updatewantedpersonform">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom border-dark">
                                                <h1 class="modal-title text-info-emphasis fs-5">Notify</h1>
                                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center gy-3">

                                                    <div class="col-md-11 position-relative">
                                                        <label for="location">Location:</label>
                                                        <input type="text" class="form-control shadow-none border-secondary" name="location" placeholder="Enter Location">
                                                        <div class="invalid-tooltip rounded-3">
                                                            * Enter Location
                                                        </div>
                                                    </div>

                                                    <div class="col-md-11 position-relative">
                                                        <label for="date">Date:</label>
                                                        <input type="date" class="form-control shadow-none border-secondary" name="date" placeholder="Enter Date">
                                                        <div class="invalid-tooltip rounded-3">
                                                            * Enter Date
                                                        </div>
                                                    </div>

                                                    <div class="col-md-11 position-relative">
                                                        <label for="time">Time:</label>
                                                        <input type="time" class="form-control shadow-none border-secondary" name="time" placeholder="Enter Time">
                                                        <div class="invalid-tooltip rounded-3">
                                                            * Enter Time
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary shadow-none border border-dark" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" value="<?= $rowtask["uid"] ?>" name="updatewantedperson" class="btn btn-success shadow-none">Update Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>



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




            $(".updatewantedpersonform").on("submit", function(e) {

                debugger;

                var location = $(this).find("input[name='location']").val(); 
                var date = $(this).find("input[name='date']").val(); 
                var time = $(this).find("input[name='time']").val(); 

                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");


                if (location != "") {
                    $(this).find("input[name='location']").removeClass("is-invalid");
                } else {
                    $(this).find("input[name='location']").addClass("is-invalid");
                    e.preventDefault();
                } 

                if (date != "") {
                    $(this).find("input[name='date']").removeClass("is-invalid");
                } else {
                    $(this).find("input[name='date']").addClass("is-invalid");
                    e.preventDefault();
                } 

                if (time != "") {
                    $(this).find("input[name='time']").removeClass("is-invalid");
                } else {
                    $(this).find("input[name='time']").addClass("is-invalid");
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