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

  <title>Sales List - Admin</title>
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
      <h1>Sales List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Sales</li>
          <li class="breadcrumb-item active">Sales Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12 ">

          <div class="card py-3 ">
            <div class="card-body">

              <div class="d-md-flex gap-2 align-items-center">

                <a href="add-sales.php" class="btn btn-info mb-3">add new Sale</a>
                <p class="bg-secondary p-2 rounded">Total Amount -

                  <?php
                  include('reused/db-config.php');

                  $sql1 = " SELECT SUM(total_price) FROM `sales`";

                  $result1 = mysqli_query($conn, $sql1);

                  while ($row = mysqli_fetch_assoc($result1)) {
                    // print_r($row);
                  ?>

                    ₹<?php echo $row['SUM(total_price)'];
                        $total_price = $row['SUM(total_price)'];
                    ?>

                  <?php } ?>



                </p>
                <p class="bg-success p-2 rounded">Advance Amount -
                  <?php
                  include('reused/db-config.php');

                  $sql1 = " SELECT SUM(advance_amount) FROM `sales`";

                  $result1 = mysqli_query($conn, $sql1);

                  while ($row = mysqli_fetch_assoc($result1)) {
                    // print_r($row);
                  ?>

                    ₹<?php echo $row['SUM(advance_amount)'];
                    $advance_amount = $row['SUM(advance_amount)'];
                     ?>
                  <?php } ?>
                </p>
                <p class="bg-warning p-2 rounded">Due Amount - 
<?php

echo $total_price - $advance_amount;

?>

                </p>

              </div>

              <?php

              if (isset($_REQUEST['success'])) {
              ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>deleted Successfully!</strong>
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
                      <th scope="col">price</th>
                      <th scope="col">category</th>
                      <th scope="col">warehouse</th>
                      <th scope="col">customer </th>
                      <th scope="col">Qunatity</th>
                      <th scope="col">biller </th>
                      <th scope="col">Total </th>
                      <th scope="col">advance</th>
                      <th scope="col">Note</th>
                      <th scope="col">date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    include('reused/db-config.php');

                    $query = "SELECT * FROM `sales`";

                    $result = mysqli_query($conn, $query);

                    $id = 0;
                    while ($row = mysqli_fetch_assoc($result)) {

                      $id++;
                    ?>


                      <tr>
                        <th scope="row"><?php echo $id ?></th>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td class="text-wrap"><?php echo $row['product_category'] ?></td>
                        <td><?php echo $row['warehouse'] ?></td>
                        <td><?php echo $row['customer_name'] ?></td>
                        <td class="text-wrap"><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['biller_name'] ?></td>
                        <td><?php echo $row['total_price'] ?></td>
                        <td class="text-wrap"><?php echo $row['advance_amount'] ?></td>
                        <td class="text-wrap"><?php echo $row['note'] ?></td>
                        <td class="text-wrap"><?php echo $row['date'] ?></td>
                        <td>
                          <a href="delete-sales.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></a>
                          <a href="Edit-sales.php?id=<?php echo  $row['id'] ?>" class="btn btn-sm btn-info m-1"><i class="bi bi-pencil-square"></i></a>
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