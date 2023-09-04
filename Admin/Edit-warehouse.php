<?php

session_start();
if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Update Warehouse - Admin</title>
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
            <h1>Update Warehouse</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Warehouse</li>
                    <li class="breadcrumb-item active">Update Warehouse</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        <?php

        include('reused/db-config.php');

        $id = $_REQUEST['id'];

        $fetchQuery = "SELECT * FROM `warehouse` WHERE id = $id" or die("Query Error");

        $fetchResult = mysqli_query($conn, $fetchQuery);
        $fetchRow = mysqli_fetch_assoc($fetchResult);

        // print_r($fetchRow); for checking 

        ?>



        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card py-3">
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">


                                <?php

                                include('reused/db-config.php');

                                if (isset($_POST['add-warehouse'])) {



                                    $id = $_POST['id'];
                                    $warehouse_no = $_POST['warehouse_no'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address'];



                                    $query = "UPDATE `warehouse` SET `warehouse_no`='$warehouse_no',`phone`='$phone',`email`='$email',`address`='$address' WHERE id = $id";


                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Updated Successfully !</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
        ';
                                    } else {
                                        echo '<script>alert("not inserted duplicate entry")</script>';
                                    }
                                }
                                ?>


                                <div class="row border">
                                    <div class="col-md-12">


                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">Warehouse</label>
                                            <div class="">
                                                <input type="hidden" value="<?php echo $fetchRow['id'] ?>" name="id" required class="form-control">
                                                <input type="text" value="<?php echo $fetchRow['warehouse_no'] ?>" name="warehouse_no" required class="form-control">
                                            </div>
                                        </div>

                                        <div class=" mb-3">
                                            <label for="inputPassword" value="<?php echo $fetchRow['warehouse_no'] ?>" class="col-form-label">Phone Number</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $fetchRow['phone'] ?>" name="phone" required class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-form-label">Email</label>
                                            <div class="">
                                                <input type="email" value="<?php echo $fetchRow['email'] ?>" name="email" required class="form-control">
                                            </div>
                                        </div>


                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                            <div class="">
                                                <textarea name="address" required class="form-control" style="height: 60px"><?php echo $fetchRow['address'] ?></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row my-3">

                                        <div class="col-sm-10">
                                            <button type="submit" name="add-warehouse" class="btn btn-primary">Update</button>
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