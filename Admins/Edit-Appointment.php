<?php
ob_start();
session_start();
include('../connection.php');

if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}



use PHPMailer\PHPMailer\PHPMailer;

function sendMail($email,$appointment_date,$appointment_time,$appointment_id_1,$name){
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);



   //email token sent 
   try{
        
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mathewdalisay@gmail.com';
    $mail->Password = 'dproewbecisldhec';
    $mail->SMTPSecure = "tls";
    $mail->Port = '587';
    $mail->setFrom('mathewdalisay@gmail.com', 'El Pueblo One');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Appointment';
    $mail->Body = "Hello good day! Mr./Mrs. $name
    <br> Here is your appointment details.
    <br>
    <h3>Appointment Date:</h3>
    <p>$appointment_date</p>
    <h3>Appointment Time: </h3>
    <p>$appointment_time . Note: 24 Hour Clock</p>
    <h3>Appointment Id: </h3>
    <p>$appointment_id_1</p>
    <br> To confirm the details, kindly click the link <a href='http://$_SERVER[SERVER_NAME]/official_real_estate/Admins/Confirm-Appointment.php?appointment_id=$appointment_id_1'>Click me </a>
    "
    ;

    $mail->send();

    echo "Sent na sya";

}catch(Exception $e){
    echo "Error sa email" .$e->getMessage();
}

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
    <h1>Edit Appointments</h1>
    <a href="Appointments.php">Back</a>
    <?php


    if(isset($_GET['appointment_id'])){

        $appointment_id = $_GET['appointment_id'];

        $sql = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";
        $run = mysqli_query($conn,$sql);
        

        if(mysqli_num_rows($run) > 0){
            foreach($run as $row ){
                ?>

                    <form action="" method="POST">

                        <label for="">Name</label>
                        <br>
                        <input type="text" name="name" value="<?php echo $row ['name']?>" readonly>
                        <br>
                        <label for="">Date</label>
                        <br>
                        <input type="date" name="date" value="<?php echo $row ['date']?>">
                        <br>
                        <label for="">Time</label>
                        <br>
                        <input type="time" name="time" value="<?php echo $row ['time']?>">
                        <br>
                        <input type="hidden" name="email" value="<?php echo $row['email']?>">
                        <input type="hidden" name="appointment_id_1" value="<?php echo $row ['appointment_id']?>">
                        <input type="submit" name="upadate_appointment" value="Update">

                        
                    
                    </form>


                <?php
            }
        }
    }
    ?>
</body>
</html>

<?php

if(isset($_POST['upadate_appointment'])){
    
    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');
    $email = $_POST['email'];

    $appointment_id_1 = $_POST['appointment_id_1'];
    $name = $_POST['name'];
    $appointment_date = $_POST['date'];
    $appointment_time = $_POST['time'];

    $query_update = "UPDATE appointments SET name ='$name', date = '$appointment_date', time = '$appointment_time' , date_time_updated = '$date $time' WHERE appointment_id = '$appointment_id'";
    $run_updated = mysqli_query($conn,$query_update) && sendMail($email,$appointment_date,$appointment_time,$appointment_id_1,$name);

    if($run_updated){
        echo "<script>window.location.href='Appointments.php' </script>";
    }else{
        echo "Error" . $conn->error;
    }
}

ob_end_flush();

?>