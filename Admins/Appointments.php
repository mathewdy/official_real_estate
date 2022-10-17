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
    <title>Document</title>
</head>
<body>

<a href="Home.php">Home</a>


<!----appointment ng mga clients------>

    <h1>Appointments</h1>
    <table>
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

   





    <!----modal to dapat---->
    <form action="Appointments.php" method="POST">
        <label for="">Name of Client</label>
        <br>
        <input type="text" name="name">
        <br>
        <label for="">Email</label>
        <br>
        <input type="email" name="email">
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


    $name = ucwords($_POST['name']);
    $email = $_POST['email'];
    $appointment_date = $_POST['date'];
    $appointment_time = $_POST['time'];
    $appointment_status = 0;
    $admin_id = $_SESSION['admin_id'];


    //validation ng appointment

    $check_appointment = "SELECT * FROM appointments WHERE email = '$email'";
    $run_check_appointment = mysqli_query($conn,$check_appointment);

    if(mysqli_num_rows($run_check_appointment) > 0){
        echo "<script>alert('Appointment Exists') </script>";
    }else{
        $query_insert_appointment = "INSERT INTO appointments (appointment_id,name,email,date,time,appointment_status,admin_or_user_id,date_time_created,date_time_updated) VALUES ('$appointment_id','$name', '$email', '$appointment_date', '$appointment_time', '$appointment_status', '$admin_id', '$date $time' , '$date $time')";
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