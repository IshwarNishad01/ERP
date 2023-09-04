  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Vinayak</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item pe-3 mx-4">
          <div class="d-lg-flex gap-2 flex-row">
            <h6 id="date" class="border-right border-2">Date</h6>
            <h6 id="time">Time</h6>
          </div>
        </li>

        <script>
          let today = new Date();

          let todayDate = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();

          document.getElementById("date").innerHTML = todayDate;
          setInterval(() => {
            let today = new Date();
            let todayTime = today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds();
            document.getElementById("time").innerHTML = todayTime;
          }, 1000);
        </script>



<?php

include('reused/db-config.php');



$query = "SELECT * FROM `admin_profile`";

$result = mysqli_query($conn, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  // print_r($row);
}

?>



        <li class="nav-item pe-0">

          <a class="nav-link nav-profile d-flex align-items-center pe-4" href="users-profile.php">
            <img src="<?php echo $row['profile_image'] ?>" alt="Profile" class="rounded-circle">
            <span class=" d-md-block  ps-2"><?php echo $row['name'] ?></span>

          </a><!-- End Profile Iamge Icon -->

          <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->





      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <!-- for products navbar and pending for customization -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-products.php">
              <span>Add Products</span>
            </a>
          </li>
          <li>
            <a href="products-data.php">
              <span>Products Lists</span>
            </a>
          </li>
        </ul>
      </li><!-- End products Nav -->


      <!-- for sales navbar and pending for customization -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#trading-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="trading-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-sales.php">
              <span>Add Sales</span>
            </a>
          </li>
          <li>
            <a href="sales-data.php">
              <span>Sales Lists</span>
            </a>
          </li>
        </ul>
      </li><!-- End sales Nav -->

      <!-- for expense navbar and pending for customization -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#expense-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cash-coin"></i><span>Expense</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="expense-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-expense.php">
              <span>Add expense</span>
            </a>
          </li>
          <li>
            <a href="expense-data.php">
              <span>expense Lists</span>
            </a>
          </li>
        </ul>
      </li><!-- End expense Nav -->

      <!-- for customers navbar and pending for customization -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#customers-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span>Customers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="customers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-customers.php">
              <span>Add customers</span>
            </a>
          </li>
          <li>
            <a href="customers-data.php">
              <span>customers Lists</span>
            </a>
          </li>
        </ul>
      </li><!-- End customers Nav -->


      <!-- messages -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="messages.php">
          <i class="bi bi-chat-dots-fill"></i>
          <span>Messages</span>
        </a>
      </li><!-- End warehouses Page Nav -->


      <!-- warehouses -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="warehouses.php">
          <i class="bi bi-shop"></i>
          <span>Warehouses</span>
        </a>
      </li><!-- End warehouses Page Nav -->


      <!-- for users navbar and pending for customization -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-video"></i>
          <span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>


        <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-users.php">
              <span>Add User</span>
            </a>
          </li>
          <li>
            <a href="users-data.php">
              <span>Users Lists</span>
            </a>
          </li>
        </ul>
      </li><!-- End users Nav -->

      <!-- stocks -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="stock.php">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Stocks</span>
        </a>
      </li><!-- End stocks Page Nav -->




      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->




    </ul>

  </aside><!-- End Sidebar-->


  <script>
    console.log("is it working");

    const clock = document.getElementById("clock");
    let time = 1;
  </script>