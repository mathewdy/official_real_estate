<?php
ob_start();

session_start();
include('../connection.php');
$_SESSION['user_id'];
$user_id = $_SESSION['user_id'];


if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$num_per_page = 05;
$start_page = ($page-1)*05;



$query_page = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created, home_owners.payment_equity AS payment_equity,home_owners.payment_status AS payment_status
FROM units
LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
WHERE home_owners.user_id = '$user_id' ORDER BY home_owners.date_time_created DESC LIMIT $start_page,$num_per_page";
$run_query_page = mysqli_query($conn,$query_page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Real Estate Management</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="home.php" >El Pueblo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Units.php">Units</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
            </svg>

          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-xxl container-lg py-5">
    <!----query ng fucking pangalan ng user--->

    <?php

        $sql_users = "SELECT * FROM users WHERE user_id = '$user_id'";
        $run_users = mysqli_query($conn,$sql_users);

        if(mysqli_num_rows($run_users) > 0){
            foreach($run_users as $row_users){
                ?>

                    <label for="">Name:</label>
                    <p><?php echo $row_users ['first_name'] ." " . $row_users['last_name']?></p>
                    <label for="">Contact Number:</label>
                    <p><?php echo $row_users ['contact_number']?></p>
                    <label for="">Email:</label>
                    <p><?php echo $row_users['email']?></p>
                    <!---modal for edit button--->
                    <a href="edit-profile.php?user_id=<?php echo $row_users['user_id']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>

                <?php
            }
        }

    ?>



    <?php

        //UPDATE USER
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];

            $sql_user_edit_profile = "SELECT * FROM users WHERE user_id = '$user_id' ";
            $run_edit_profile = mysqli_query($conn,$sql_user_edit_profile);

            if(mysqli_num_rows($run_edit_profile) > 0){
                foreach($run_edit_profile as $row_profiles){
                    ?>
                        <form action="" method="POST">

                        <input type="hidden" name="user_id" value="<?php echo $row_profiles['user_id']?>">
                        <label for="">First Name:</label>
                        <input type="text" name="first_name" value="<?php echo $row_profiles['first_name']?>" required>
                        <label for="">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php echo $row_profiles['middle_name']?>" required>
                        <label for="">Last Name:</label>
                        <input type="text" name="last_name" value="<?php echo $row_profiles['last_name']?>" required>
                        <label for="">Contact Number:</label>
                        <input type="text" name="contact_number" value="<?php echo $row_profiles['contact_number']?>" required>
                        <label for="">Email:</label>
                        <input type="text" name="email" value="<?php echo $row_profiles['email']?>">
                        <input type="submit" name="update_profile" value="Update">
                        </form>
                    <?php
                }
            }
        }
    ?>

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
    <!-------for appointments ito----->
    <div class="table-responsive my-5">
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
    </div>
    <h2>Availed Units</h2>
    <div class="container-fluid p-0 m-0">
        <ol class="list-group list-group-numbered p-0">
            <?php 
               $query = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
               home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created
               FROM units
               LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
               WHERE home_owners.user_id = '$user_id' AND home_owners.payment_equity = 'Reservation Fee' ";
               $run = mysqli_query($conn,$query);
               if(mysqli_num_rows($run) > 0){
                $no = 1;
                foreach ($run as $row){
            ?>
            <li class="list-group-item d-flex align-items-start">
                <form action="" method="POST" class="d-flex justify-content-around align-items-start w-100">
                    <div class="ms-2 me-auto d-flex flex-column">
                        <input type="text" class="fw-bold" style="border:none; outline:none; background:none;" name="model" value="<?php echo $row ['model']?>" readonly>
                        <input type="text" style="border:none; outline:none; background:none;" name="unit_id" value="<?php echo 'Unit ID: ' . $row ['unit_id']?>" readonly>
                        <input type="text" style="border:none; outline:none; background:none;" name="room_id" value="<?php echo 'Room ID: '.$row ['room_id']?>"readonly>
                        <input type="text" style="border:none; outline:none; background:none;" name="type" value="<?php echo 'Type: '. $row ['type']?>"readonly>
                    </div>
                    <div class="me-auto d-flex flex-column">
                        <input type="text" style="border:none; outline:none; background:none;" name="floor_area" value="<?php echo 'Floor Area: '. $row ['floor_area']?>"readonly>
                        <input type="text" style="border:none; outline:none; background:none;" name="total_price_contract" value="<?php echo 'Total Price: ' .'₱'.$row ['total_price_contract']?>" readonly>   
                        <input type="text" style="border:none; outline:none; background:none;" name="option_equity" value="<?php echo 'Option Equity: '.'₱'.$row ['option_equity']?>" readonly>
                        <input type="hidden" name="process" value="1" readonly>   
                    </div>
                    <span class="badge bg-primary rounded-pill"><input type="submit" name="pay_room_id" value="Pay" style="background:none; border: none; color: rgba(255,255,255,0.7); z-index: 11111;"></span>
                </form>
            </li>
            <?php
                    $no++;
                    }
                }else{
                    echo "No Units yet" . $conn->error;
                }

            ?>
            </ol>
            </div>  

    <h3>Statement of Account</h3>
    <div class="table-responsive">

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Room ID</th>
                <th>Payment Status</th>
                <th>Payment Equity</th>
                <th>Your Pament</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $query_statement_of_Account = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
                home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created, home_owners.payment_equity AS payment_equity,home_owners.payment_status AS payment_status
                FROM units
                LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
                WHERE home_owners.user_id = '$user_id' ORDER BY home_owners.date_time_created DESC";
                $run_account = mysqli_query($conn,$query_statement_of_Account);

                if(mysqli_num_rows($run_account) > 0){
                    foreach($run_account as $row_account){
                        ?>

                        <tr>
                            <td>
                                <?php 
                                $d = strtotime($row_account['date_time_created']);
                                echo date("M-d-Y", $d);
                                ?>
                            </td>
                            <td><?php echo $row_account ['room_id']?></td>
                            <td>
                                <?php 
                                    if($row_account ['payment_status'] == '1'){
                                        echo "Payment Received";
                                    }else{
                                        echo "Pending";
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if($row_account['payment_equity'] == 'Option Equity'){
                                        echo "Monthly Fee";
                                    }else{
                                        echo "Reservation Fee";
                                    }
                                ?>
                            
                            </td>

                            <td>
                                <?php 
                                   
                                    if($row_account ['payment_status'] == '1'){
                                            echo $row_account ['payment_receive'];
                                    }else{
                                        echo "Pending";
                                    }
                                ?>
                            </td>
                            <td><?php echo $row_account['payment_method']?></td>
                            <td>

                                
                                <?php

                                if($row_account['payment_status'] == '1'){
                                    echo
                                    "<a href='pdf.php?user_id=$row_account[user_id]' target=_blank>Generate Invoice</a>";

                                }
                                
                                ?>
                            </td>
                            
                        </tr>

                        <?php
                    }
                }else{
                    echo "No Payments yet". $conn->error;
                }

            ?>
        </tbody>
    </table>
    <?php

        $query_page_2 = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
        home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created, home_owners.payment_equity AS payment_equity,home_owners.payment_status AS payment_status
        FROM units
        LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
        WHERE home_owners.user_id = '$user_id' ORDER BY home_owners.date_time_created DESC";
        $run_page_2 = mysqli_query($conn,$query_page_2);
        $total_record = mysqli_num_rows($run_page_2);

        $total_page = ceil($total_record / $num_per_page);

        if($page > 1){
            echo  "<a href='home.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
        }

        for($i=1;$i<$total_page;$i++){
            echo  "<a href='home.php?page=".$i."' class='btn btn-primary'>$i</a>";

        }

        if($i > $page){
            echo  "<a href='home.php?page=".($page+1)."' class='btn btn-primary'>Next</a>";
        }
    ?>
    </div>
   
</div>


<script src="../src/styles/boostrap/popper.js"></script>
<script src="../src/styles/boostrap/bootstrap.js"></script>
</body>
</html>

<?php

if(isset($_POST['pay_room_id'])){
    $unit_id = $_POST['unit_id'];
    $room_id = $_POST['room_id'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $floor_area = $_POST['floor_area'];
    $total_price_contract = $_POST['total_price_contact'];
    $option_equity = $_POST['option_equity'];
    $process = $_POST['process'];
    

    if($process == 1){
        $_SESSION['unit_id'] = $unit_id;
        $_SESSION['room_id'] = $room_id;
        $_SESSION['model'] = $model;
        $_SESSION['type'] = $type;
        $_SESSION['floor_area'] = $floor_area;
        $_SESSION['total_price_contract'] = $total_price_contract;
        $_SESSION['option_equity'] = $option_equity;
        header("Location: Your-Units-Payment.php");
    }else{
        echo "error" . $conn->error;
    }
}

ob_end_flush();
?>

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

//update button profile

if(isset($_POST['update_profile'])){
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];

    $update_user_info = "UPDATE users SET first_name = '$first_name' , middle_name = '$middle_name' , last_name = '$last_name', contact_number = '$contact_number', email= '$email' WHERE users_id = '$user_id'";
    $run_update_info = mysqli_query($conn,$update_user_info);

    if($run_update_info){
        echo "<script>window.location.href='Home.php' </script>";
    }else{
        echo "error" . $conn->error;
    }


}



ob_end_flush();

?>