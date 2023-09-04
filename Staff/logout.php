<?php
session_start();
if (isset($_SESSION['staff-name'])) {
    session_unset();
    session_destroy();
    header('location: index.php');
}
