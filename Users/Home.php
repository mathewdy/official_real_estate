<?php
ob_start();

session_start();
include('../connection.php');
$_SESSION['user_id'];
$user_id = $_SESSION['user_id'];


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/headers.css">
    <title>Real Estate Management</title>
</head>
<body>
        <!---create tayo ng appointment pati pag bili ng kanyang property ng condo--->
   
    <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="Home.php" class="nav-link px-2 text-secondary">Home</a></li>
            <li><a href="Units.php" class="nav-link px-2 text-white">Buy Unit</a></li>
            <li><a href="Your-Units.php" class="nav-link px-2 text-white">Your Units</a></li>
            <li>    
            <!-- Button trigger modal -->
            <li>
                <a href="" class="nav-link px-2 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Appointment</a>
            </li>
        </ul>
        <div class="text-end">
           
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
            </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Log Out
                    </a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </header>
    <!-------for appointments ito----->
    <table  class="table table-hover table-success">
        <thead>
            <tr>
                <th>No.</th>
                <th>Appointment ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment Status</th>
            </tr>
        </thead>
        <tbody>
        <?php

            $sql_appointments = "SELECT * FROM appointments WHERE admin_or_user_id = '$user_id'";
            $run_your_appointments = mysqli_query($conn,$sql_appointments);
            //gagawa pa ako pagination

            if(mysqli_num_rows($run_your_appointments) > 0){
                $no = 1;

                foreach($run_your_appointments as $row){
                    ?>

                        <tr>
                            <td><?php echo $no."."?></td>
                            <td><?php echo $row ['appointment_id']?></td>
                            <td><?php 
                                    $date = $row['date'];
                                    $date = str_replace('/', '-', $date);
                                    echo date('M-d-Y', strtotime($date));
                                ?></td>
                            <td><?php echo $row ['time']?></td>
                            <td>
                                <?php if($row ['appointment_status'] == '1')
                                {
                                    echo "Confirmed";
                                }else{
                                    echo "Pending";

                                }
                                ?>
                            </td>
                        </tr>

                    <?php

                $no++;

                }
            }


        ?>
        </tbody>
    </table>

 
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Set Appointment</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <label for="">Date</label>
                <input type="date" class="form-control"  name="date" id="">
                <label for="">Time</label>
                <input type="time" class="form-control"  name="time" id="">
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="add_appointment" class="btn btn-success" value="Create Appointment">
        </div>
        </div>
        </form>

    </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['add_appointment'])){

    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    $appointment_id = "2022".rand('10','20') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 4) ;


    $email = $_SESSION['email'];
    $appointment_date = $_POST['date'];
    $appointment_time = $_POST['time'];
    $appointment_status = 0;
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $user_id = $_SESSION['user_id'];

    //validation ng appointment

    $check_appointment = "SELECT * FROM appointments WHERE appointment_status = '0' AND email = '$email'";
    $run_check_appointment = mysqli_query($conn,$check_appointment);

    if(mysqli_num_rows($run_check_appointment) > 0){
        echo "<script>alert('You still have an appointment') </script>";
    }else{
        $query_insert_appointment = "INSERT INTO appointments (appointment_id,name,email,date,time,appointment_status,admin_or_user_id,date_time_created,date_time_updated) VALUES ('$appointment_id','$first_name $last_name', '$email', '$appointment_date', '$appointment_time', '$appointment_status', '$user_id', '$date $time' , '$date $time')";
        $run_insert = mysqli_query($conn,$query_insert_appointment);

        if($run_insert){
            echo "<script>window.location.href='home.php'</script>";
        }else{
            echo "error" . $conn->error;
        }

    }

    
}



ob_end_flush();

?>