<?php

session_start();
if (!isset($_SESSION['staff-name'])) {
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Add Warehouse - Staff</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <?php include('reused/header.php') ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Add New Warehouse</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Warehouse</li>
                    <li class="breadcrumb-item active">Add New Warehouse</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card py-3">
                        <div class="card-body">
                     
                            <form>
                                <div class="row border">
                                    <div class="col-md-12">


                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">Warehouse</label>
                                            <div class="">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-form-label">Phone Number</label>
                                            <div class="">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-form-label">Email</label>
                                            <div class="">
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>


                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                            <div class="">
                                                <textarea class="form-control" style="height: 60px"></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row my-3">

                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->

    <?php include('reused/footer.php') ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>