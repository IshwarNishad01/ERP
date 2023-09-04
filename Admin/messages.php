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

    <title>Messages - Admin</title>
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
            <h1>Messages </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Stock</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">


                <div class="col-lg-12 ">

                    <div class="card py-3 ">
                        <div class="card-body">


                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">New Message</button>

                            <!-- modal for new message -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">





                                            <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">
                                                <div class="mb-3">
                                                    <label for="from-name" class="col-form-label">From</label>
                                                    <input type="text" value="admin" name="from" class="form-control" id="from-name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="to-name" class="col-form-label">To</label>
                                                    <input type="text" value="user" name="to" class="form-control" id="to-name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message" class="col-form-label">Message</label>
                                                    <textarea name="message" class="form-control" id="message"></textarea>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="reset()">Close</button>

                                            <input type="submit" class="btn btn-info" name="send" id="" value="send message">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <div class="table-responsive mt-4">
                                <h5>Message History</h5>


                                <?php

                                include('reused/db-config.php');

                                if (isset($_POST['send'])) {



                                    $from = $_POST['from'];
                                    $to = $_POST['to'];
                                    $message = $_POST['message'];



                                    $query = "INSERT INTO `message`(`from_message`, `to_message`, `message`) VALUES ('$from','$to','$message')";


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



                                <?php

                                if (isset($_REQUEST['success'])) {
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>deleted Successfully!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php
                                } ?>




                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">from</th>
                                            <th scope="col">to</th>
                                            <th scope="col">message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include('reused/db-config.php');

                                        $query = "SELECT * FROM `message`";

                                        $result = mysqli_query($conn, $query);

                                        $id = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $id++;
                                        ?>


                                            <tr>
                                                <th scope="row"><?php echo $row['time'] ?></th>
                                                <td><?php echo $row['from_message'] ?></td>
                                                <td><?php echo $row['to_message'] ?></td>
                                                <td class="text-wrap"><?php echo $row['message'] ?></td>
                                                <td>
                                                    <a href="deleteMessage.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></a>

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



    <script>
        const fromMsg = document.getElementById("from-name");
        const toMsg = document.getElementById("from-name");
        // const fromMsg = document.getElementById("message").value;


        function reset() {
            fromMsg.value = "";
            toMsg.value = "";
        }
    </script>

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