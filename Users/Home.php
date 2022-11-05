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
            <li>    
            <!-- Button trigger modal -->
            <li>
                <a href="" class="nav-link px-2 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Appointment</a>
            </li>
        </ul>
        <div class="text-end">
            <a href="Logout.php" class="btn btn-outline-light me-2">Log out</a>
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
                            <td><?php echo $row ['date']?></td>
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

    <a href="Your-Units.php">Your Units</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>