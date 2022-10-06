<?php
ob_start();

session_start();
include('../connection.php');
$_SESSION['user_id'];
$_SESSION['email'];
$_SESSION['first_name'];
$_SESSION['last_name'];

if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}
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
    <form action="">
        <!---create tayo ng appointment pati pag bili ng kanyang property ng condo--->
        <a href="Logout.php">Log out</a>
    </form>
</body>
</html>