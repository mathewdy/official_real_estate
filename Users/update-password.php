<?php

include('../connection.php');
session_start();
ob_start();
$_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../src/img/icons/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/custom.css">
    <link rel="stylesheet" href="../src/css/app.css">
    <title>Soul Inc.</title>
</head>
<body style="background: rgba(0, 0, 0, 0.9);">
<div class="container">
    <form action="" method="POST" class="d-flex justify-content-center p-lg-5">
        <div class="row card p-5 bg-dark mt-5">
            <div class="col-lg-12">
                <p class="h1" style="color:rgba(255,255,255,0.6);">Update Password</p>
            </div>
            <div class="col-lg-12 col-md-12 mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="col-lg-12">
                <input type="submit" name="update_password" value="Submit" class="btn btn-secondary w-100">
            </div>
        </div>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['update_password'])){
    $email = $_SESSION['email'];

    $password = $_POST['password'];
    $sql_update_password = "UPDATE users SET password = '$password' WHERE email = '$email' LIMIT 1";
    $run = mysqli_query($conn,$sql_update_password);

    if($run){
        echo "<script>alert('Password Updated') </script>";
        echo "<script>window.location.href='login.php' </script>";
    }else{
        echo "error" . $conn->error;
    }

}

ob_end_flush();

?>