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
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">

    
</head>

<body>
<main class="form-signin">
  <form action="" method="POST">
        <center>
            <h2>El Pueblo Condormitel</h2>
        </center>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="Email">
      <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
  
  </form>
    <a href="forgot-password.php" style="text-decoration: none;">Forgot Password</a>
    <br>
    <a href="Registration.php" style="text-decoration: none;">Create Account</a>
</main>

       

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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