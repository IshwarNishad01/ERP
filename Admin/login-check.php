<?php


$servarName = "localhost";
$userName = "root";
$password = "";
$databaseName = "erp";
$conn = mysqli_connect($servarName, $userName, $password, $databaseName);
$username =  $_POST['username'];
$password =  $_POST['password'];
$query = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);
if (mysqli_affected_rows($conn) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        session_start();
        $_SESSION['userName'] = $username;
        header('location: dashboard.php?success');
    }
} else {
    header('location: index.php?danger');
}
