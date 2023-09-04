<?php

$id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from sales where id = $id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: sales-data.php?success');
}
