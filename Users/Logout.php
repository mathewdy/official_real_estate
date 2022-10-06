
<?php

session_start();
$_SESSION['email'];
$_SESSION['user_id'];
$_SESSION['first_name'];
$_SESSION['last_name'];
unset($_SESSION['email']);
unset($_SESSION['user_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);


session_destroy();
echo "<script>window.location.href='login.php' </script>";

?>