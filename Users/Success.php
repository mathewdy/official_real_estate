<?php
ob_start();
session_start();
include('../connection.php');

date_default_timezone_set("Asia/Manila");
$time= date("h:i:s", time());
$date = date('y-m-d');

$_SESSION['user_id']. '<br>';
$_SESSION['unit_id'] . '<br>';
$_SESSION['reservation_fee'];
$reservation_fee = $_SESSION['reservation_fee'];
$contact_number = $_SESSION['contact_number'];

$user_id = $_SESSION['user_id'];
$unit_id = $_SESSION['unit_id'];

$payment_status = '1';
$payment_method = 'Paypal';
$payment_equity = 'Reservation Fee';
// mag subtract ako ng units dito pati mag lagay ng room id 

$room_id  = "C3".rand('11','30') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);

$query_room_id = "SELECT * FROM home_owners WHERE room_id = '$room_id'";
$run_room_id = mysqli_query($conn,$query_room_id);

if(mysqli_num_rows($run_room_id) > 0){
    echo "Room Id Exists";
}else{
    $sql = "INSERT INTO home_owners (user_id,unit_id,room_id,payment_receive,payment_equity,payment_method,payment_status,date_time_created,date_time_updated) VALUES ('$user_id','$unit_id','$room_id', '$reservation_fee' , '$payment_equity', '$payment_method', '$payment_status' , '$date $time' , '$date $time' )";
    $run = mysqli_query($conn,$sql);

    if($run){


        /*
        require_once 'vendor/autoload.php';
        $MessageBird = new \MessageBird\Client('rQykO8vX5lfFhmh045Wfoilw0');
        $Message = new \MessageBird\Objects\Message();
        $Message->originator = '+639156915704';
        $Message->recipients = $contact_number;
        $Message->body = "You already paid your monthly payment for your $room_id amounting $option_equity
        Thank you so much.
        ";

        $MessageBird->messages->create($Message);
        */
        echo"added unit owner";
        unset($_SESSION['unit_id']);
        unset($_SESSION['reservation_fee']);
        $subtract_sql = "UPDATE units SET units.available = (units.available - 1) WHERE units.unit_id = '$unit_id'";
        $run_subtract = mysqli_query($conn,$subtract_sql);

        header("Location: Your-Units.php");
    }else{
        echo "error";
    }
}

ob_end_flush();
?>