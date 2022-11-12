<?php

include('../connection.php');
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;


$user_id = $_GET['user_id'];
$sql = "SELECT users.first_name, users.middle_name, users.last_name , home_owners.date_time_created,home_owners.unit_id,home_owners.room_id,home_owners.payment_receive,home_owners.payment_equity,home_owners.payment_method
FROM users
LEFT JOIN home_owners 
ON users.user_id = home_owners.user_id 
WHERE users.user_id = '$user_id'";
$run = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($run);
$room_id = $rows['room_id'];


$sql_1 = "SELECT units.total_price_contract, home_owners.payment_receive,
(units.total_price_contract - SUM(home_owners.payment_receive)) AS remaining_balance
FROM units
LEFT JOIN 
home_owners ON units.unit_id = home_owners.unit_id 
WHERE user_id = '$user_id' AND home_owners.room_id = '$room_id'";
$run_1 = mysqli_query($conn,$sql_1);
$row = mysqli_fetch_assoc($run_1);

$dompdf = new Dompdf;
ob_start();
require('invoice.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
// $dompdf->stream('invoice.pdf');

$dompdf->stream("Flights", ['Attachment'=>false]);
?>


