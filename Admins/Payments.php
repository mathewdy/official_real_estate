<?php

include('../connection.php');
session_start();
ob_start();


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
<div class="container my-5">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Full Name</td>
                    <td>Room ID</td>
                    <td>Payment Recieve</td>
                    <td>Payment Equity</td>
                    <td>Payment Method</td>
                    <td>Payment Status</td>
                    <td>Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT users.user_id, users.first_name, users.last_name,
                    home_owners.room_id,home_owners.payment_receive,home_owners.payment_equity,
                    home_owners.payment_method,home_owners.payment_status,home_owners.date_time_created 
                    FROM users
                    LEFT JOIN home_owners 
                    ON users.user_id = home_owners.user_id
                    WHERE home_owners.payment_method = 'Online Deposit' OR home_owners.payment_method = 'Paypal'";
                    $run = mysqli_query($conn,$sql);

                    if(mysqli_num_rows($run) > 0){
                        $no = 1;
                        foreach($run as $row){
                            ?>

                                <tr>
                                    <td><?php echo $no?></td>
                                    <td><?php echo $row ['first_name'] . $row ['last_name']?></td>
                                    <td><?php echo $row ['room_id']?></td>
                                    <td>
                                        <?php 
                                            if($row['payment_status'] == '1'){
                                                echo $row['payment_receive'];
                                            }else{
                                                echo "Pending";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $row['payment_equity']?></td>
                                    <td><?php echo $row['payment_method']?></td>
                                    <td>
                                        <?php 

                                            if($row['payment_status'] == '1'){
                                                echo "Payment Received";
                                            }else{
                                                echo "Pending";
                                            }
                                        ?>
                                        </td>
                                    <td>
                                        <?php 
                                        echo date("M-d-Y", strtotime($row['date_time_created']));
                                        ?>
                                    </td>
                                    <td>
                                        
                                        <?php

                                            if($row['payment_status'] == '0'){
                                                echo "<a href='Edit-Payment-Status.php'>Edit</a>";
                                                //hindi pa to tapos haha , gagawa ako dito ng edit payment , if ma confirm yung image

                                                // once na na confirm ko na yung payment is na recieved babalik ako kay users para mag lagay ng if statement kung na confirm na yung bayad mag gegenerate ng invoice, if ever na hindi pa. wag muna
                                            }else{
                                                echo "";
                                            }

                                        ?>
                                        
                                        
                                    </td>
                                </tr>

                            <?php
                        
                    $no++;}
                    }


                ?>
            </tbody>
        </table>
    </div>

</div>
    
<script src="../src/styles/boostrap/popper.js"></script>
<script src="../src/styles/boostrap/bootstrap.js"></script>
</body>
</html>

<?php


ob_end_flush();


?>