<?php

$id =  $_REQUEST['id'];

include('reused/db-config.php');


$query = "Delete from message where id = $id";

$result = mysqli_query($conn, $query);

if ($result) {
    header('location: messages.php?success');
}
