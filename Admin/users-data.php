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

    <title>User List - Admin</title>
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
            <h1>User List </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">User</li>
                    <li class="breadcrumb-item active">User Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">





                <div class="col-lg-12 ">

                    <div class="card py-3 ">
                        <div class="card-body">


                            <a href="add-users.php" class="btn btn-info mb-3">add new user</a>

                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">image</th>
                                            <th scope="col">name</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">email</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        include('reused/db-config.php');

                                        $query = "SELECT * FROM `users`";

                                        $result = mysqli_query($conn, $query);

                                        $id = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $id++;
                                            // print_r($row);
                                        ?>

                                            <tr>
                                                <th scope="row"><?php echo $id ?></th>
                                                <td><img src="<?php echo $row['image'] ?>" height="50" width="auto" alt=""></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['phone'] ?></td>
                                                <td><?php echo $row['email'] ?></td>

                                                <td>
                                                    <a href="delete-user.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></a>
                                                    <a href="Edit-user.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info m-1"><i class="bi bi-pencil-square"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
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