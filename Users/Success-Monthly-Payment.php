<?php
ob_start();
session_start();
include('../connection.php');

date_default_timezone_set("Asia/Manila");
$time= date("h:i:s", time());
$date = date('y-m-d');

$_SESSION['unit_id'];
$_SESSION['room_id'] ;
$_SESSION['model'];
$_SESSION['type'];
$_SESSION['floor_area'] ;
$_SESSION['total_price_contract'] ;
$_SESSION['option_equity'];
$room_id = $_SESSION['room_id'];

$user_id = $_SESSION['user_id'];
$unit_id = $_SESSION['unit_id'];
$contact_number = $_SESSION['contact_number'];
$option_equity = $_SESSION['option_equity'];
$payment_status = '1';
$payment_method = 'Paypal';
$payment_equity = 'Option Equity';

//query
$sql = "INSERT INTO home_owners (user_id ,unit_id ,room_id,payment_receive,payment_equity,payment_method,payment_status,date_time_created,date_time_updated) VALUES ('$user_id','$unit_id','$room_id','$option_equity','$payment_equity','$payment_method','$payment_status' ,'$date $time','$date $time')";
$run = mysqli_query($conn,$sql);


if($run) {
    /*
    require_once 'vendor/autoload.php';
    $MessageBird = new \MessageBird\Client('sA5Lcu5czwv2rfBM62Cq8wBqL');
    $Message = new \MessageBird\Objects\Message();
    $Message->originator = '+639156915704';
    $Message->recipients = $contact_number;
    $Message->body = "You already paid your monthly payment for your $room_id amounting $option_equity Thank you so much.
    ";
    $MessageBird->messages->create($Message);
    */


    echo "<script>window.location.href='Home.php' </script>";
}else{
    echo "error"  . $conn->error;
}

?>