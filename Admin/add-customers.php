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

    <title>Add Customer - Admin</title>
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
            <h1>Add New Customer</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">customer</li>
                    <li class="breadcrumb-item active">add customer</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- General Form Elements -->
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                                <?php

                                include('reused/db-config.php');

                                if (isset($_POST['submit'])) {



                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $category = $_POST['category'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address'];


                                    $query = "INSERT INTO `customers`( `c_name`, `c_category`, `c_email`, `c_phone`, `c_address`) VALUES ('$name','$category','$email','$phone','$address')";


                                    $result = mysqli_query($conn, $query);
                                    if ($result) {
                                        echo '
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Inserted Successfully !</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                                        ';
                                    } else {
                                        echo '<script>alert("not inserted duplicate entry")</script>';
                                    }
                                }
                                ?>


                                <div class="row border">
                                    <div class="col-lg-6 ">
                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">customer Name</label>
                                            <div class="">
                                                <input type="text" name="name" required class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputEmail" class=" col-form-label">Email Address</label>
                                            <div class="">
                                                <input required type="email" name="email" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" mt-2 mb-3">
                                            <label for="formFile" class="form-label">customer Category</label>
                                            <div class="">
                                                <select required name="category" class="form-select m-0" aria-label="Default select example">
                                                    <option selected disabled> select Category</option>
                                                    <?php
                                                    include('reused/db-config.php');

                                                    $sql1 = "  SELECT  DISTINCT category_name FROM `customer_category`;";

                                                    $result1 = mysqli_query($conn, $sql1);

                                                    while ($row = mysqli_fetch_assoc($result1)) {

                                                    ?>

                                                        <option value="<?php echo $row['category_name'] ?>"><?php echo $row['category_name']; ?></option>

                                                    <?php } ?>


                                                </select>

                                            </div>
                                        </div>

                                        <div class="mb-4 ">
                                            <label for="formFile" class="form-label">Phone Number</label>
                                            <div class="">
                                                <input required name="phone" class="form-control" type="text" id="formFile">
                                            </div>
                                        </div>

                                    </div>


                                    <div class=" mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                        <div class="">
                                            <textarea required name="address" class="form-control" style="height: 80px"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row my-3">

                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
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