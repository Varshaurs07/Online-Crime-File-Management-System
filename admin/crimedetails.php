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
                            <a class="nav-link text-white fw-bold" aria-current="page" href="police.php">
                                <i class="fa-solid fa-user-plus"></i>
                                Add Police</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="managepolice.php">
                                <i class="fa-solid fa-user-tie"></i>
                                Manage Police</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold text-decoration-underline link-offset-2 active " aria-current="page" href="crimedetails.php">
                                <i class="fa-solid fa-list"></i>
                                Crime Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold" aria-current="page" href="report.php">
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
                        Crime Assigned Failed !
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
                        Crime Assigned Successfully !
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
                            Crime Delete Failed !
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
                        Crime Delete Successfully !
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

        <div class="container flex-fill d-flex flex-column my-2">


            <div class="d-flex mt-5 mb-5 justify-content-start align-items-center">
                <h3 class="text-danger-emphasis link-offset-1 text-decoration-underline flex-grow-1 flex-md-grow-0">
                    Crime Details
                </h3>
            </div>


            <div class="row justify-content-center mt-2 mb-4">


                <div class="col-md-12">

                    <form action="deletecomplaint.php" method="post" id="deletecomplaintform"></form>


                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="usertable">
                            <thead class="text-white">
                                <tr class="align-middle text-center text-nowrap table-danger">
                                    <th>Name</th>
                                    <th>Crime Type</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Location</th>
                                    <th>Police Station</th>
                                    <th>Explanation</th>
                                    <th>Assigned Police</th>
                                    <th>Status</th>
                                    <th>Assign</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "select * from crime_2023_complaint";
                                $result = mysqli_query($link, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr class="align-middle">
                                        <td><?= $row["name"] ?></td>
                                        <td><?= $row["type"] ?></td>
                                        <td><?= $row["date"] ?></td>
                                        <td><?= $row["time"] ?></td>
                                        <td><?= $row["location"] ?></td>
                                        <td><?= $row["policestation"] ?></td>
                                        <td><?= $row["explanation"] ?></td>
                                        <td><?= $row["policename"] == "" ? "N/A" : $row["policename"] ?></td>
                                        <td><?= $row["status"] ?></td>
                                        <?php
                                        if ($row["police"] == "") {
                                        ?>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#edit<?= $row["uid"] ?>">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </td>
                                        <?php
                                        } else {
                                            echo "<td>N/A</td>";
                                        }
                                        ?>
                                        <td>
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-sm delete text-white shadow-none" name="butdel" form="deletecomplaintform" value="<?= $row["uid"] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php
                    $querytask = "SELECT * FROM crime_2023_complaint";
                    $resulttask = mysqli_query($link, $querytask);
                    $count = mysqli_num_rows($resulttask);
                    while ($rowtask = mysqli_fetch_array($resulttask)) {
                        if ($rowtask["status"] == "open") {
                    ?>

                            <div class="modal fade" id="edit<?= $rowtask["uid"] ?>" tabindex="-1" aria-labelledby="edit<?= $rowtask["uid"] ?>Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="updatecomplaint.php" method="post" class="updatecomplaintform">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom border-dark">
                                                <h1 class="modal-title text-info-emphasis fs-5">Assign Police</h1>
                                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-center gy-3">

                                                    <div class="col-md-11 position-relative">
                                                        <label for="police">Police:</label>
                                                        <select class="form-select shadow-none border-secondary" name="police">
                                                            <option value="">Select Police</option>
                                                            <?php
                                                            $query = "select * from crime_2023_police where stationname = '" . $rowtask["policestation"] . "'";
                                                            $result = mysqli_query($link, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="invalid-tooltip rounded-3">
                                                            * Enter Police
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="name">

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary shadow-none border border-dark" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" value="<?= $rowtask["uid"] ?>" name="updatecomplaint" class="btn btn-success shadow-none">Update Changes</button>
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




            $(".updatecomplaintform").on("submit", function(e) {

                debugger;

                var police = $(this).find("select[name='police']").val(); 

                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");


                if (police != "") {
                    $(this).find("select[name='police']").removeClass("is-invalid");
                    $(this).find("input[name='name']").val($(this).find("select[name='police'] option:selected").text());
                } else {
                    $(this).find("select[name='police']").addClass("is-invalid");
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