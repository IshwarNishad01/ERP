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

    <title>Edit Product - Staff</title>
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
            <h1>Edit product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item">Edit Product</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->


        <?php

        include('reused/db-config.php');

        $id = $_REQUEST['id'];

        $fetchQuery = "SELECT * FROM `products` WHERE id = $id" or die("Query Error");

        $fetchResult = mysqli_query($conn, $fetchQuery);
        $fetchRow = mysqli_fetch_assoc($fetchResult);

        // print_r($fetchRow); for checking 

        ?>


        <?php


        if (isset($_POST['add'])) {

            $name = $_POST['name'];
            $p_id = $_POST['p_id'];

            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $code = $_POST['code'];
            $category = $_POST['category'];

            $filename = $_FILES['images']['name'];
            $fullpath = $_FILES['images']['full_path'];
            $filetype = $_FILES['images']['type'];
            $tempLocation = $_FILES['images']['tmp_name'];
            $destination = '../Admin/images/' . $filename;
            // save images into local server
            move_uploaded_file($tempLocation, $destination);


            // insert into databse


            $conn = mysqli_connect("localhost", "root", "", "erp");


            $query = "UPDATE `products` SET `name`='{$name}',`price`='{$price}',`code`='{$code}',`image`='{$destination}',`quantity`='{$quantity}',`category`='{$category}' WHERE id = {$p_id}";

            $result = mysqli_query($conn, $query) or die("query error");


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


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card py-3">
                        <div class="card-body">

                            <!-- General Form Elements -->
                            <form actio="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                <div class="row border">
                                    <div class="col-lg-6 ">
                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">Product Name</label>
                                            <div class="">
                                                <input type="hidden" required name="p_id" value="<?php echo $fetchRow['id'] ?>" class="form-control">
                                                <input type="text" required name="name" value="<?php echo $fetchRow['name'] ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputEmail" class=" col-form-label">Product Code</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $fetchRow['code'] ?>" required name="code" class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-form-label">Qunatity</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $fetchRow['quantity'] ?>" required name="quantity" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" mb-3">
                                            <label for="inputTime" class=" col-form-label">Product Price</label>
                                            <div class="">
                                                <input type="text" value="<?php echo $fetchRow['price'] ?>" required name="price" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-4 ">
                                            <label for="formFile" class="form-label">Product Image</label>
                                            <div class="">
                                                <input class="form-control" value="<?php echo $fetchRow['image'] ?>" required name="images" type="file" id="formFile">
                                            </div>
                                        </div>


                                        <div class=" mb-3">
                                            <label for="formFile" class="form-label">Product Category</label>
                                            <div class="">
                                                <select class="form-select m-0" required name="category" aria-label="Default select example">
                                                    <option selected disabled> select Category</option>
                                                    <option value="laptop">Laptop</option>
                                                    <option value="mobile">Mobiles</option>
                                                    <option value="tv">TV</option>
                                                    <option value="ac">AC</option>
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row my-3">

                                    <div class="col-sm-10">
                                        <input type="submit" name="add" class="btn btn-primary" value="Update">
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