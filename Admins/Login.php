<?php
ob_start();
session_start();
include('../connection.php');

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
    
    <form action="Login.php" method="POST">
        <h1>Log in Admin</h1>
        <label for="">Username</label>
        <br>
        <input type="text" name="username">
        <br>
        <label for="">Password</label>
        <br>
        <input type="password" name="password">
        <input type="submit" name="login" value="Log In">
    </form>

</body>
</html>

<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $run = mysqli_query($conn,$sql);

    if($run){
        if(mysqli_num_rows($run) == 1){
            $result_fetch = mysqli_fetch_asssoc($run);

            if(($_POST['username']) == $result_fetch['username'] && ($_POST['password']) == $result_fetch['password']){
                $_SESSION['username']= $result_fetch['username'];
                $_SESSION['name'] $result_fetch['name'];
                header("Location: Home.php");
            }
        }else{
            echo "User not found" . $conn->error;
        }
    }
}


?>