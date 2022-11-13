<?php
ob_start();
session_start();
include('../connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}

// gagawa din dito ng pagination 
// search bar
//lists of clients to
// sms notif
// email notif to confirm, 2hrs before pumunta sa appointment dapat nag update for terms and conditions sa email

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
<div class="container-xxl container-lg py-5">
<span class="d-flex justify-content-between">
<h1>Appointments</h1>
<span>
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Appointment</a>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="Appointments.php" method="POST">
        <div class="modal-body">
            <!----modal to dapat---->
            <!-- ayan modal na -->
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="">Name of Client</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email"> 
                </div>
                <div class="col-lg-6 vstack mb-3">
                    <label for="">Date</label>
                    <input type="date" class="form-control" name="date" id="">
                </div>
                <div class="col-lg-6 vstack mb-3">
                    <label for="">Time</label>
                    <input type="time" class="form-control" name="time" id="">
                </div>
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="add_appointment" class="btn btn-primary" value="Create Appointment">
        </div>
    </form>
    </div>
  </div>
</div>
</span>
</span>

<div class="table-responsive">
<table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Appointment ID</th>
                <th>Name of Client</th>
                <th>Email</th>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $query_appointments = "SELECT * FROM appointments";
            $run_sql_appointments = mysqli_query($conn,$query_appointments);

            if(mysqli_num_rows($run_sql_appointments) > 0){
                $no = 1;
                foreach($run_sql_appointments as $row){

                    //gagawa pa ako CRUD ng appointments
                    ?>

                        <tr>
                            <td><?php echo $no?></td>
                            <td><?php echo $row['appointment_id']?></td>
                            <td><?php echo $row ['name']?></td>
                            <td><?php echo $row ['email']?></td>
                            <td><?php echo $row ['date']?></td>
                            <td><?php echo $row ['time']?></td>
                            <td><?php if($row ['appointment_status'] == 0){
                                echo "Pending";
                            }else{
                                echo "Confirmed";
                            }?></td>
                            <td>
                                <a href="Edit-Appointment.php?appointment_id=<?php echo $row ['appointment_id']?>">Edit</a>
                                <a href="Delete-Appointment.php?appointment_id=<?php echo $row ['appointment_id']?>">Delete</a>
                            </td>
                        </tr>

                    <?php
                
                $no++;
                }
            }


        ?>
        </tbody>
    </table>
</div>
    

</div>


<!----appointment ng mga clients------>

   
   





   
<script src="../src/styles/boostrap/popper.js"></script>
<script src="../src/styles/boostrap/bootstrap.js"></script>
</body>
</html>

<?php

if(isset($_POST['add_appointment'])){

    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    $appointment_id = "2022".rand('10','20') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 4) ;


    $name = ucwords($_POST['name']);
    $email = $_POST['email'];
    $appointment_date = $_POST['date'];
    $appointment_time = $_POST['time'];
    $appointment_status = 0;
    $admin_id = $_SESSION['admin_id'];

    


    //validation ng appointment

    $check_appointment = "SELECT * FROM appointments WHERE email = '$email' AND appointment_status = '$appointment_status'";
    $run_check_appointment = mysqli_query($conn,$check_appointment);

    if(mysqli_num_rows($run_check_appointment) > 0){
        echo "<script>alert('Appointment Pending'); </script>";
        echo "<script>window.location.href='Appointments.php' </script>";
    }else{

        $query_insert_appointment = "INSERT INTO appointments (appointment_id,name,email,date,time,appointment_status,admin_or_user_id,date_time_created,date_time_updated) VALUES ('$appointment_id','$name', '$email', '$appointment_date', '$appointment_time', '$appointment_status', '$admin_id', '$date $time' , '$date $time')";
        $run_insert = mysqli_query($conn,$query_insert_appointment);

        if($run_insert){
            echo "<script>alert('Appointment Added'); </script>";
            echo "<script>window.location.href='Appointments.php' </script>";
        }else{
            echo "error" . $conn->error;
        }
    }
    
}

ob_end_flush();

?>