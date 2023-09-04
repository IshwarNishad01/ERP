<?php

include('reused/db-config.php');

$fullName = $_POST['fullName'];
$id = $_POST['id'];
$about = $_POST['about'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$updateQuery = "UPDATE `user_profile` SET `name`='{$fullName}',`about`='{$about}',`phone`='{$phone}',`email`='{$email}',`address`='{$address}' WHERE `id` = {$id} ";


$result = mysqli_query($conn, $updateQuery);
if (mysqli_affected_rows($conn) > 0) {
    header('location: users-profile.php?success');
}
?>