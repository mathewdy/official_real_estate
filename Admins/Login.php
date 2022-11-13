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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <title>Real Estate Management</title>
</head>
<body>


<main class="form-signin">
  <form action="" method="POST">
        <center>
            <h2>El Pueblo Condormitel</h2>
        </center>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
  
  </form>
    <a href="forgot-password.php" style="text-decoration: none;">Forgot Password</a>
    <br>
</main>
    

</body>
</html>

<?php

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $run = mysqli_query($conn,$sql);

    if($run){
        if(mysqli_num_rows($run) > 0){
            foreach($run as $row){
                $_SESSION['username'] = $username;
                $_SESSION['name'] = $row['name'];
                $_SESSION['admin_id'] = $row['admin_id'];
                header("Location: Home.php");
            }
            
            
        }else{
            echo "User not found" . $conn->error;
        }
    }
}


?>