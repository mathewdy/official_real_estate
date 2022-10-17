<?php
include('../connection.php');


if(isset($_GET['appointment_id'])){
    $appointment_id = $_GET['appointment_id'];

    $sql = "SELECT * FROM appointments WHERE appointment_id = '$appointment_id'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            $appointment_status  = 1;

            $update_appointment_status = "UPDATE appointments SET appointment_status = '$appointment_status' WHERE appointment_id ='$appointment_id'";
            $run_appointment = mysqli_query($conn,$update_appointment_status);

            if($run){
                echo "Appointment set";
            }else{
                echo "error" . $conn->error;
            }
            
        }
    }
}

?>