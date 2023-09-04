
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

    <title>Products List - Staff</title>
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
            <h1>Products List</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Product Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">





                <div class="col-lg-12 ">
                    <div class="card py-3 ">
                        <div class="card-body">




                            <a href="add-products.php" class="btn btn-info mb-3">add new product</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="btn btn-secondary ms-3 mb-3">add new category</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-success ms-3 mb-3">Update Quantity</a>

                            <!-- modal for add new category -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">New Category</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <?php

                                            include('reused/db-config.php');

                                            if (isset($_POST['send'])) {

                                                $category = $_POST['category'];

                                                $insertCategory = "INSERT INTO `products_category`( `category`) VALUES ('{$category}')";

                                                $resullt3 = mysqli_query($conn, $insertCategory);
                                            }
                                            ?>

                                            <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">

                                                <div class="mb-3">
                                                    <label for="to-name" class="col-form-label">Category</label>
                                                    <input type="text" name="category" class="form-control" id="to-name">
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="reset()">Close</button>

                                            <input type="submit" class="btn btn-info" name="send" id="" value="Add">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- modal for update product Quantity -->

                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Product Quantity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">


                                            <?php

                                            include('reused/db-config.php');


                                            if (isset($_POST['update'])) {

                                                $quantity = $_POST['quantity'];
                                                $name = $_POST['product_name'];

                                                $updateQuantity = "UPDATE `products` SET `quantity`='{$quantity}' WHERE `name`= '{$name}' ";

                                                $resullt3 = mysqli_query($conn, $updateQuantity);
                                            }
                                            ?>

                                            <form action="<?php $_SERVER['PHP_SELF'] ?> " method="post">


                                                <div class="mb-3">
                                                    <label for="p_name" class="col-form-label">Product Name</label>
                                                    <select name="product_name" class="form-control" id="p_name">
                                                        <option value="" selected disabled>select product name</option>
                                                        <?php
                                                        $fetchProduct = "SELECT `name` from `products`";
                                                        $result = mysqli_query($conn, $fetchProduct);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                        ?>
                                                            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="to-name" class="col-form-label">Quantity</label>
                                                    <input type="text" name="quantity" class="form-control" id="to-name">
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="reset()">Close</button>

                                            <input type="submit" class="btn btn-info" name="update" id="" value="Update">
                                        </div>
                                        </form>
                                    </div>
                                </div>
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
                                            <th scope="col">image</th>
                                            <th scope="col">name</th>
                                            <th scope="col">category</th>
                                            <th scope="col">code</th>
                                            <th scope="col">qunatity</th>
                                            <th scope="col">price</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        include('reused/db-config.php');

                                        $query = "SELECT * FROM `products`";

                                        $result = mysqli_query($conn, $query);

                                        $id = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $id++;
                                        ?>


                                            <tr>
                                                <th scope="row"><?php echo $id ?></th>
                                                <td><img src="../Admin/<?php echo $row['image'] ?>" height="80" width="120" alt=""></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td class="text-wrap"><?php echo $row['category'] ?></td>
                                                <td><?php echo $row['code'] ?></td>
                                                <td><?php echo $row['quantity'] ?></td>
                                                <td class="text-wrap"><?php echo $row['price'] ?></td>


                                                <td>
                                                    <a href="delete-products.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger m-1"><i class="bi bi-trash"></i></a>
                                                    <a href="Edit-products.php?id=<?php echo  $row['id'] ?>" class="btn btn-sm btn-info m-1"><i class="bi bi-pencil-square"></i></a>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                            <?php

                            if (isset($_REQUEST['success'])) {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Deleted Successfully!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php
                            } ?>
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



<!-- prodcuts list -->

category - mobiles / laptops / AC / TV