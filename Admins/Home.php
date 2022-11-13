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
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#" style="font-size:2em;">El Pueblo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Units.php">Units</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Payments.php">Payments</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="Logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">

    <!---dashboard kase total payment recieved via paypal--->

    <?php


        $sql = "SELECT SUM(home_owners.payment_receive) AS total_payment_received
        FROM home_owners";
        $run = mysqli_query($conn,$sql);

        if(mysqli_num_rows($run ) > 0){
            foreach($run as $row){
                ?>

                    <h2>Total Earnings:</h2>
                    <p><?php echo $row ['total_payment_received']?></p>

                <?php

            }
        }


    ?>
</div>
    
<script src="../src/styles/boostrap/popper.js"></script>
<script src="../src/styles/boostrap/bootstrap.js"></script>
</body>
</html>


<?php

ob_end_flush();
?>