<?php


$servarName = "localhost";
$userName = "root";
$password = "";
$databaseName = "erp";
$conn = mysqli_connect($servarName, $userName, $password, $databaseName);
$username =  $_POST['username'];
$password =  $_POST['password'];
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

if (mysqli_affected_rows($conn) > 0) {
    session_start();
    $_SESSION['staff-name'] = $username;
    header('location: dashboard.php?success');
} else {
    header('location: index.php?danger');
}
