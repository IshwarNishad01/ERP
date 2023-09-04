<?php

$expense_id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from expense where id = $expense_id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: expense-data.php?success');
}
