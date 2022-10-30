<?php
ob_start();
session_start();
include('../connection.php');
if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $query = "DELETE FROM appointments WHERE appointment_id = '$appointment_id' ";
    $run = mysqli_query($conn,$query);

    if($run){
        echo "<script>window.location.href='Appointments.php' </script>";
    }else{
        echo "error " . $conn->error;
    }

}


?>