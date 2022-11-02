<?php
ob_start();
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}
include('../connection.php');
$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="Units.php">Units</a>
    <a href="Appointments.php">Appointments</a>
    <a href="Profile.php">Profile</a>
    <a href="Payments.php">Payments</a>
    <a href="Logout.php">Log Out</a>
</body>
</html>


<?php

ob_end_flush();
?>