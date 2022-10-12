<?php
include('../connection.php');
session_start();
ob_start();

if(isset($_GET['v_token'])){
    $v_token = $_GET['v_token'];

    //query muna natin kung parehas sila ng token
    $sql = "SELECT * FROM users WHERE v_token = '$v_token'";
    $run = mysqli_query($conn,$sql);

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            

            $email_status = 1;

            $update_email_status = "UPDATE users SET email_status = '$email_status' WHERE v_token = '$v_token' LIMIT 1 ";
            $run_update_email_status = mysqli_query($conn,$update_email_status);

            if($run_update_email_status){
                echo "<script>alert('Email Verified'); </script>";
                echo "<script>window.location.href='Login.php' </script>";
            }else{
                echo "error" . $conn->error;
            }


        }
    }
}


?>