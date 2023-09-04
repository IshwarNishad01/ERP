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

    <title>Update Customer Data - Staff</title>
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
            <h1>Update Customer Data</h1>
            <?php

            include('reused/db-config.php');

            $id = $_REQUEST['id'];

            $fetchQuery = "SELECT * FROM `customers` WHERE id = $id" or die("Query Error");

            $fetchResult = mysqli_query($conn, $fetchQuery);
            $fetchRow = mysqli_fetch_assoc($fetchResult);

            // print_r($fetchRow);
            ?>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">customer</li>
                    <li class="breadcrumb-item active">Update customer Data</li>
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



                                    $id = $_POST['id'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $category = $_POST['category'];
                                    $phone = $_POST['phone'];
                                    $address = $_POST['address'];


                                    $query = "UPDATE `customers` SET `c_name`='$name',`c_category`='$category',`c_email`='$email',`c_phone`='$phone',`c_address`='$address' WHERE id = $id";


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
                                    <div class="col-lg-6 ">
                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">customer Name</label>
                                            <div class="">
                                                <input type="hidden" name="id" value="<?php echo $fetchRow['id'] ?>" required class="form-control">
                                                <input type="text" name="name" value="<?php echo $fetchRow['c_name'] ?>" required class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputEmail" class=" col-form-label">Email Address</label>
                                            <div class="">
                                                <input required value="<?php echo $fetchRow['c_email'] ?>" type="email" name="email" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" mt-2 mb-3">
                                            <label for="formFile" class="form-label">customer Category</label>
                                            <div class="">
                                                <select required name="category" value="<?php echo $fetchRow['c_name'] ?>" class="form-select m-0" aria-label="Default select example">
                                                    <option selected disabled><?php echo $fetchRow['c_category'] ?> </option>
                                                    <?php
                                                    include('reused/db-config.php');

                                                    $sql1 = "SELECT DISTINCT c_category FROM `customers` ;";

                                                    $result1 = mysqli_query($conn, $sql1);

                                                    while ($row = mysqli_fetch_assoc($result1)) {

                                                    ?>

                                                        <option value="<?php echo $row['c_category']; ?>"><?php echo $row['c_category']; ?></option>

                                                    <?php } ?>


                                                </select>

                                            </div>
                                        </div>

                                        <div class="mb-4 ">
                                            <label for="formFile" class="form-label">Phone Number</label>
                                            <div class="">
                                                <input required name="phone" value="<?php echo $fetchRow['c_phone'] ?>" class="form-control" type="text" id="formFile">
                                            </div>
                                        </div>

                                    </div>


                                    <div class=" mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                        <div class="">
                                            <textarea required name="address" class="form-control" style="height: 80px"><?php echo $fetchRow['c_address'] ?></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row my-3">

                                    <div class="col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-primary">Update Changes</button>
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