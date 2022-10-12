<?php
session_start();
include('../connection.php');
ob_start();


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
        <h1>Log in</h1>
        <label for="">Email</label>
        <br>
        <input type="email" name="email">
        <br>
        <label for="">Password</label>
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>

<?php

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $query_login = "SELECT * FROM users WHERE email= '$email' AND password ='$password'";
    $run = mysqli_query($conn,$query_login);

    if($run){
        if(mysqli_num_rows($run) == 1){
            $result_fetch = mysqli_fetch_assoc($run);

            if($result_fetch['email_status'] =='1'){
                if(($_POST['email'] == $result_fetch['email']) && ($_POST['password'] == $_POST['password'])){
                    $_SESSION['user_id'] = $result_fetch ['user_id'];
                    $_SESSION['email'] = $result_fetch['email'];
                    $_SESSION['first_name'] = $result_fetch['first_name'];
                    $_SESSION['last_name'] = $result_fetch['last_name'];
                    header("Location: Home.php");
                }else{
                    echo "User Not found 2" . $conn->error;
                }
            }else{
                echo "<script>alert('Please verify your email address, check on spam or junk') </script>";
            }

            
        }else{
        echo "user not found 1" .$conn->error;

        }
    }else{
        echo "user not found 1" .$conn->error;
    }
}

ob_end_flush();

?>