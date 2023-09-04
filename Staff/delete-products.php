<?php

$id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from products where id = $id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: products.php?success');
}
