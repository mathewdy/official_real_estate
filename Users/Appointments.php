<?php
ob_start();
session_start();
include('../connection.php');

$_SESSION['user_id'];
$_SESSION['email'];
$_SESSION['first_name'];
$_SESSION['last_name'];
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
    <title>Document</title>
</head>
<body>
    <a href="Home.php">Back</a>
    <h1>Your Appointments</h1>

    <table>
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
    


    <h1>Set Appointment</h1>
    <form action="" method="POST">
        <br>
        <label for="">Date</label>
        <br>
        <input type="date" name="date" id="">
        <br>
        <label for="">Time</label>
        <br>
        <input type="time" name="time" id="">
        <br>
        <input type="submit" name="add_appointment" value="Create Appointment">
    </form>
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
            echo "Appointment Added";
        }else{
            echo "error" . $conn->error;
        }

    }

    
}

ob_end_flush();

?>