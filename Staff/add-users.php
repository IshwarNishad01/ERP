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

    <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
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
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Elements</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New users</h5>

                            <!-- General Form Elements -->
                            <form>
                                <div class="row border">
                                    <div class="col-lg-6 ">
                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">User Name</label>
                                            <div class="">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="formFile" class="form-label">User Gender</label>
                                            <div class="">
                                                <select class="form-select m-0" aria-label="Default select example">
                                                    <option selected> select Gender</option>
                                                    <option value="1">male</option>
                                                    <option value="2">female</option>
                                                </select>

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
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" mb-3">
                                            <label for="inputTime" class=" col-form-label">user password</label>
                                            <div class="">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-4 ">
                                            <label for="formFile" class="form-label">user Image</label>
                                            <div class="">
                                                <input class="form-control" type="file" id="formFile">
                                            </div>
                                        </div>


                                        <div class=" mb-3">
                                            <label for="formFile" class="form-label">User Role</label>
                                            <div class="">
                                                <select class="form-select m-0" aria-label="Default select example">
                                                    <option selected> select Category</option>
                                                    <option value="1">Biller</option>
                                                    <option value="2">Staff</option>

                                                </select>

                                            </div>
                                        </div>


                                        <!-- textarea -->
                                        <!-- <div class=" mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                    <div class="">
                    <textarea class="form-control" style="height: 100px"></textarea>
                    </div>
                </div> -->


                                    </div>
                                </div>


                                <div class="row my-3">

                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create</button>
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