<?php
include('../connection.php');

//update button profile

if(isset($_POST['update_profile'])){
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];

    $update_user_info = "UPDATE users SET first_name = '$first_name' , middle_name = '$middle_name' , last_name = '$last_name', contact_number = '$contact_number', email= '$email' WHERE user_id = '$user_id'";
    $run_update_info = mysqli_query($conn,$update_user_info);

    if($run_update_info){
        echo "<script>window.location.href='home.php' </script>";
    }else{
        echo "error" . $conn->error;
    }


}
?>