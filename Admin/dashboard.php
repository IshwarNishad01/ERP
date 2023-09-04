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

  <title>Dashboard - Admin</title>
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





  <main id="main" class="main">

    <div class="pagetitle">
      
  <?php require('reused/header.php'); ?>

<?php

if (isset($_REQUEST['success'])) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Welcome Admin 😃...</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Sales </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = "  SELECT SUM(quantity) FROM `sales`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['SUM(quantity)']; ?></h6>

                      <?php } ?>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Revenue </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = " SELECT SUM(total_price) FROM `sales`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6>₹<?php echo $row['SUM(total_price)']; ?></h6>

                      <?php } ?>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Customers</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">


                      <?php
                      include('reused/db-config.php');

                      $sql1 = "  SELECT COUNT(id) FROM `customers`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['COUNT(id)']; ?></h6>

                      <?php } ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Stock Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Stock</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-shop"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = " SELECT SUM(quantity) FROM `products`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['SUM(quantity)']; ?></h6>

                      <?php } ?>


                      </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Stock Card -->

            <!-- Expense Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Expense </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash-coin"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = " SELECT SUM(amount) FROM `expense`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6>₹<?php echo $row['SUM(amount)']; ?></h6>

                      <?php } ?>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Expense Card -->

            <!-- products Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Products </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = "  SELECT COUNT(id) FROM `products`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['COUNT(id)']; ?></h6>

                      <?php } ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- messages Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">messages </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-chat-dots-fill"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = "  SELECT COUNT(id) FROM `message`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['COUNT(id)']; ?></h6>

                      <?php } ?>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End messages Card -->

            <!-- Users Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Users </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      include('reused/db-config.php');

                      $sql1 = "  SELECT COUNT(id) FROM `users`";

                      $result1 = mysqli_query($conn, $sql1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        // print_r($row);
                      ?>

                        <h6><?php echo $row['COUNT(id)']; ?></h6>

                      <?php } ?>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Users Card -->

          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>

  </main><!-- End #main -->

  <?php require('reused/footer.php'); ?>

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