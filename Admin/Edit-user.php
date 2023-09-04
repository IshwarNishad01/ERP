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

    <title>Edit User - Admin</title>
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


    <?php

include('reused/db-config.php');

$id = $_REQUEST['id'];

$fetchQuery = "SELECT * FROM `users` WHERE id = $id" or die("Query Error");

$fetchResult = mysqli_query($conn, $fetchQuery);
$fetchRow = mysqli_fetch_assoc($fetchResult);

// print_r($fetchRow); 
// for checking 

?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit User </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card py-3">
                        <div class="card-body">


                            <?php

                            include('reused/db-config.php');

                            if (isset($_POST['add'])) {


                                $id = $_POST['id'];
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $password = $_POST['password'];
                                $gender = $_POST['gender'];
                                // print_r($_FILES);
                                $filename = $_FILES['image']['name'];
                                $fullpath = $_FILES['image']['full_path'];
                                $filetype = $_FILES['image']['type'];
                                $tempLocation = $_FILES['image']['tmp_name'];
                                $destination = 'images/' . $filename;
                                // save images into local server
                                move_uploaded_file($tempLocation, $destination);


                                $insertUserQuery = "UPDATE `users` SET `username`='{$username}',`password`='{$password}',`gender`='{$gender}',`image`='{$destination}',`phone`='{$phone}',`email`='{$email}' WHERE `id`={$id}";



                                $result = mysqli_query($conn, $insertUserQuery);
                                if ($result) {
                                    echo '
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Updated Successfully !</strong>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
';
                                } else {
                                    echo '
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>User already Exits !</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    ';
                                }
                            }

                            ?>




                            <!-- General Form Elements -->
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                                <div class="row border">
                                    <div class="col-lg-6 ">
                                        <div class=" mb-3">
                                            <label for="inputText" class=" col-form-label">User Name</label>
                                            <div class="">
                                            <input type="hidden"  name="id" value="<?php echo $fetchRow['id'] ?>" class="form-control">
                                                <input type="text" required  value="<?php echo $fetchRow['username'] ?>" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="formFile" class="form-label">User Gender</label>
                                            <div class="">
                                                <select class="form-select m-0"  value="<?php echo $fetchRow['gender'] ?>" required name="gender" aria-label="Default select example">
                                                    <option selected disabled> select Gender</option>
                                                    <option value="male">male</option>
                                                    <option value="female">female</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <label for="inputPassword" class="col-form-label">Phone Number</label>
                                            <div class="">
                                                <input type="text"  value="<?php echo $fetchRow['phone'] ?>" required name="phone" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class=" mb-3">
                                            <label for="inputTime" class=" col-form-label">user password</label>
                                            <div class="">
                                                <input type="password"  value="<?php echo $fetchRow['password'] ?>" required name="password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3 ">
                                            <label for="formFile" class="form-label">user Image</label>
                                            <div class="">
                                                <input class="form-control"  name="image" type="file" id="formFile">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputPassword" class="col-form-label">Email</label>
                                            <div class="">
                                                <input type="email"  value="<?php echo $fetchRow['email'] ?>" required name="email" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row my-3">

                                    <div class="col-sm-10">
                                        <button type="submit" name="add" class="btn btn-primary">Update </button>
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