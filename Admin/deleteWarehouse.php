<?php

$warehouse_id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from warehouse where id = $warehouse_id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: warehouses.php?success');
}
