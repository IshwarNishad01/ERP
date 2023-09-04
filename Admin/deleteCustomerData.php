<?php

$customer_id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from customers where id = $customer_id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: customers-data.php?success');
}
