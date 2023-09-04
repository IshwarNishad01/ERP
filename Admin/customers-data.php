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

  <title>Customer List - Admin</title>
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
      <h1>Customers List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>

          <li class="breadcrumb-item active">Customers </li>
          <li class="breadcrumb-item active">Customers Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">


        <div class="col-lg-12 ">

          <div class="card  ">
            <div class="card-body">
              <h5 class="card-title"></h5>




              <a href="add-customers.php" class="btn btn-info mb-3">add new customers</a>
              
              <?php

              if (isset($_REQUEST['success'])) {
              ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Deleted Successfully!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php
              } ?>

              <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>

                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">category</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone No.</th>
                      <th scope="col">address</th>
                      <th scope="col">Action</th>

                    </tr>
                  </thead>
                  <tbody>


                    <?php

                    include('reused/db-config.php');

                    $query = "SELECT * FROM `customers`";

                    $result = mysqli_query($conn, $query);

                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($result)) {

                      $sno++;
                    ?>

                      <tr>
                        <th scope="row"><?php echo $sno ?></th>
                        <td><?php echo $row['c_name'] ?></td>
                        <td><?php echo $row['c_category'] ?></td>
                        <td><?php echo $row['c_email'] ?></td>
                        <td><?php echo $row['c_phone'] ?></td>
                        <td><?php echo $row['c_address'] ?></td>

                        <td>
                          <a href="deleteCustomerData.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></a>
                          <a href="Edit-CustomerData.php?id=<?php echo  $row['id'] ?>" class="btn btn-sm btn-info m-1"><i class="bi bi-pencil-square"></i></a>
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