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

  <title>Dashboard - Staff</title>
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

      <?php

      if (isset($_REQUEST['success'])) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Welcome <?php echo $_SESSION['staff-name'] ?> 😃...</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php
      }
      ?>

      <h1> Billing Section - sales</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Sales</li>
          <li class="breadcrumb-item active">Billing</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">


        <div class="col-md-12">
          <div class="card">
            <div class="card-body">


              <h5 class="card-title">

              </h5>


              <!-- General Form Elements -->
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                <?php



                include('reused/db-config.php');

                if (isset($_POST['submit'])) {

                  $productName = $_POST['p_name'];
                  $price = $_POST['p_price'];
                  $qunatity = $_POST['quantity'];
                  $warehouse = $_POST['warehouse'];
                  $customer_name = $_POST['c_name'];
                  $note = $_POST['note'];
                  $product_category = $_POST['p_category'];
                  $biller_name = $_POST['user_name'];
                  $advanceAmount = $_POST['advanceAmount'];
                  $total_price = $_POST['totalPrice'];




                  // fetch origianl quantity of product from products table
                  $fetchQuantityquery = "SELECT `quantity` FROM `products` where `name` = '{$productName}' ";

                  $fetchQuantityResult = mysqli_query($conn, $fetchQuantityquery);

                  if ($row = mysqli_fetch_assoc($fetchQuantityResult)) {
                    // print_r($row);
                    $originalQunatity = $row['quantity'];
                    // echo $originalQunatity;
                  }

                  if ($originalQunatity > $qunatity) {

                    $newQuantiy = $originalQunatity - $qunatity;
                    // echo $newQuantiy;
                  } else {
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Out Of Stock ! ! Buy More</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                    $newQuantiy = "out of stock";
                  }


                  $query = "INSERT INTO `sales`( `product_name`, `price`, `quantity`, `warehouse`, `customer_name`, `product_category`, `total_price`, `biller_name`, `advance_amount`, `note`) VALUES ('{$productName}','{$price}','{$qunatity}','{$warehouse}','{$customer_name}','{$product_category}','{$total_price}','{$biller_name}','{$advanceAmount}','$note')";


                  $result = mysqli_query($conn, $query);



                  // update quantity of products in products table 
                  $updateQuantiy = "UPDATE `products` SET `quantity`='{$newQuantiy}' WHERE `name` = '{$productName}' ";


                  $updateQuantiyResult = mysqli_query($conn, $updateQuantiy);



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
                      <label for="inputText" class=" col-form-label">Product Name</label>
                      <div class="">
                        <select class="form-select m-0" required name="p_name" aria-label="Default select example">
                          <option selected disabled>Select Product </option>
                          <?php
                          include('reused/db-config.php');

                          $sql1 = "  SELECT  DISTINCT name FROM `products`;";

                          $result1 = mysqli_query($conn, $sql1);

                          while ($row = mysqli_fetch_assoc($result1)) {

                          ?>

                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name']; ?></option>

                          <?php } ?>


                        </select>
                      </div>
                    </div>

                    <div class=" mb-3">
                      <label for="inputPassword" class="col-form-label">Qunatity</label>
                      <div class="">
                        <input type="text" name="quantity" required class="form-control">
                      </div>
                    </div>
                    <div class=" mb-2">
                      <label for="formFile" class="form-label">warehouse </label>
                      <div class="">
                        <select class="form-select m-0" required name="warehouse" aria-label="Default select example">
                          <option selected disabled> select warehouse</option>

                          <?php
                          include('reused/db-config.php');

                          $sql1 = "  SELECT  DISTINCT warehouse_no FROM `warehouse`;";

                          $result1 = mysqli_query($conn, $sql1);

                          while ($row = mysqli_fetch_assoc($result1)) {

                          ?>

                            <option value="<?php echo $row['warehouse_no'] ?>"><?php echo $row['warehouse_no']; ?></option>

                          <?php } ?>


                        </select>

                      </div>
                    </div>
                    <div class=" mb-3">
                      <label for="inputPassword" class="col-form-label">Total Price</label>
                      <div class="">
                        <input type="text" required name="totalPrice" class="form-control">
                      </div>
                    </div>
                    <div class=" mb-3">
                      <label for="inputPassword" class="col-form-label">Advance Amount</label>
                      <div class="">
                        <input type="text" required name="advanceAmount" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class=" mb-3">
                      <label for="inputTime" class=" col-form-label">Product Price</label>
                      <div class="">
                        <input type="text" required name="p_price" class="form-control">
                      </div>
                    </div>


                    <div class=" mb-3">
                      <label for="formFile" class="form-label">Customer Name</label>
                      <div class="">
                        <select class="form-select m-0" required name="c_name" aria-label="Default select example">
                          <option selected disabled> select Category</option>

                          <?php
                          include('reused/db-config.php');

                          $sql1 = "  SELECT  DISTINCT c_name FROM `customers`;";

                          $result1 = mysqli_query($conn, $sql1);

                          while ($row = mysqli_fetch_assoc($result1)) {

                          ?>

                            <option value="<?php echo $row['c_name'] ?>"><?php echo $row['c_name']; ?></option>

                          <?php } ?>

                        </select>

                      </div>
                    </div>



                    <div class=" mb-3">
                      <label for="formFile" class="form-label">Product Category</label>
                      <div class="">
                        <select class="form-select m-0" required name="p_category" aria-label="Default select example">
                          <option selected disabled> select Category</option>
                          <?php
                          include('reused/db-config.php');

                          $sql1 = "  SELECT  DISTINCT category FROM `products_category`;";

                          $result1 = mysqli_query($conn, $sql1);

                          while ($row = mysqli_fetch_assoc($result1)) {

                          ?>

                            <option value="<?php echo $row['category'] ?>"><?php echo $row['category']; ?></option>

                          <?php } ?>

                        </select>

                      </div>
                    </div>

                    <div class=" mb-3">
                      <label for="formFile" class="form-label">Biller</label>
                      <div class="">
                        <select class="form-select m-0" required name="user_name" aria-label="Default select example">
                          <option selected disabled> select Category</option>
                      
                          <?php
                          include('reused/db-config.php');
                          session_start();
                          $userkaname = $_SESSION['staff-name'];
                          $sql1 = "  SELECT username FROM `users` where username = '{$userkaname}'";

                          $result1 = mysqli_query($conn, $sql1);
                          while ($row = mysqli_fetch_assoc($result1)) {

                          ?>

                            <option value="<?php echo $row['username'] ?>">
                            
                            <?php echo $row['username']; ?></option>

                          <?php } ?>

                        </select>

                      </div>
                    </div>

                    <div class=" mb-3">
                      <label for="inputNote" class="col-form-label">Note</label>
                      <div class="">

                        <textarea name="note" id="inputNote" class="form-control"></textarea>
                      </div>
                    </div>


                  </div>
                </div>


                <div class="row my-3">

                  <div class="col-sm-10">
                    <button type="submit" name="submit" class="btn btn-primary">Submit </button>
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