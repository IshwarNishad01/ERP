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

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
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
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">





        <div class="col-lg-12 ">

          <div class="card  ">
            <div class="card-body">
              <h5 class="card-title">Sales list</h5>

              <a href="add-sales.php" class="btn btn-info mb-3">add new Sale</a>

              <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">price</th>
                      <th scope="col">category</th>
                      <th scope="col">customer</th>
                      <th scope="col">qunatity</th>
                      <th scope="col">biller</th>
                      <th scope="col">date</th>
                      <th scope="col">Note</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, aliquid.</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2014-12-05</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, aliquid.</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2011-08-12</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, aliquid.</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>34</td>
                      <td>2012-06-11</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, aliquid.</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2011-04-19</td>
                      <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, aliquid.</td>
                    </tr>
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