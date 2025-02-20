<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.css" />

    <style>
        /* .form-control {
            box-shadow: none !important;
        }

        .form-select {
            box-shadow: none !important;
        }
 

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            border-color: #eb6864 #eb6864 white;
        }

        .sorting {
            text-align: center !important;
        }

        .page-link {
            box-shadow: none !important;
        } */
    </style>
</head>

<body>
    <div class="min-vh-100 d-flex flex-column">

        <nav class="navbar navbar-expand-lg bg-danger border border-white-subtle">
            <div class="container-fluid">
                <a class="navbar-brand text-white d-flex align-items-center gap-2 lead fw-bold" href="#">
                    <!-- <img src="images/image.png" width="125" alt="logo"> -->
                    <i class="fa-solid fa-laptop-file"></i> <span class="d-none d-md-block text-nowrap">ONLINE CRIME FILE MANAGEMENT SYSTEM</span> <span class="d-block d-md-none text-nowrap">OCFMS</span>
                </a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-white "></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fs-6 active text-white text-shadow text-decoration-underline link-offset-2 fw-bold" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 text-white text-shadow fw-bold" href="user/index.php"><i class="fa-solid fa-user-group"></i> User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 text-white text-shadow fw-bold" href="police/index.php"> <i class="fa-solid fa-user-tie"></i> Police</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6 text-white text-shadow fw-bold" href="admin/index.php"><i class="fa-sharp fa-solid fa-user-secret"></i> Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="images/hero.jpg" class="d-block max-vh-100 w-100" />
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
        </div>



        <div class=" bg-danger border border-white container-fluid pt-4 pb-3 ">
            <!-- <h4 class="text-center mb-2 fw-light text-light">Find your new place with Real Estate
                </h4>
                <p class="text-center fst-italic text-white">
                    Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed
                    <br />
                    dolor lorem cras adipiscing
                </p> -->
        </div>

        <div class="container-fluid pt-4 pb-3">
            <h4 class="text-center mb-5 fw-light fs-4 text-danger  text-decoration-underline link-offset-2">Our Services
            </h4>
            <div class="row pt-3 justify-content-evenly">
                <!-- <div class="col-md-3 text-center">
                        <i class="fa-solid fa-location-dot fa-3x text-green"></i>
                        <p class="mt-3 fs-5 lead text-green">Find places anywhere in the world</p>
                    </div> -->
                <div class="col-md-3 text-center">
                    <a href="user/index.php" class="text-decoration-none">
                        <i class="fa-solid fa-user-group fa-3x text-danger "></i>
                        <p class="mt-3 fs-5 lead text-danger ">User</p>
                    </a>
                </div>
                <div class="col-md-3 text-center">
                    <a href="police/index.php" class="text-decoration-none">
                        <i class="fa-solid fa-user-tie  fa-3x text-danger "></i>
                        <p class="mt-3 fs-5 lead text-danger "> Police</p>
                    </a>
                </div>
                <div class="col-md-3 text-center">
                    <a href="admin/index.php" class="text-decoration-none">
                        <i class="fa-sharp fa-solid fa-user-secret fa-3x text-danger "></i>
                        <p class="mt-3 fs-5 lead text-danger ">Admin</p>
                    </a>
                </div>
            </div>
        </div>


        <div class="flex-grow-1"></div>

        <footer class="bg-danger text-uppercase text-white text-center">
        ONLINE CRIME FILE MANAGEMENT SYSTEM <span id="year"></span>
        </footer>



    </div>

    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>

    <script>
        $(function() {
            $(window).scroll(function() {
                $('nav').toggleClass('scrolled', $(this).scrollTop() > ($('#carouselExampleSlidesOnly').height() - $('nav').height()));
            });

            $("#year").html(new Date().getFullYear());
        })
    </script>
</body>

</html>