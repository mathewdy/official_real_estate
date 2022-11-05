<?php
ob_start();
session_start();
include('../connection.php');
$user_id = $_SESSION['user_id'];
if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}


if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql = "SELECT users.first_name, users.middle_name, users.last_name , home_owners.date_time_created,home_owners.unit_id,home_owners.room_id,home_owners.payment_receive,home_owners.payment_equity,home_owners.payment_method
    FROM users
    LEFT JOIN home_owners 
    ON users.user_id = home_owners.user_id 
    WHERE users.user_id = '$user_id'";
    $run = mysqli_query($conn,$sql);

}


if(mysqli_num_rows($run) > 0){
    foreach($run as $row1){
        $first_name = $row1['first_name'];
        $last_name = $row1['last_name'];
    }
}
$html = '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>
<body>

    <label>El Peublo Quezon City</label>
    <br>
    <label>Kingspoint Subdivision, Quezon City, Philippines</label>
    <br>


    <label>Name: '.$first_name.' '.$last_name.'</label>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Unit ID</th>
                <th>Room ID</th>
                <th>Amount</th>
                <th>Payment Equity</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        
';

if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
       
        $date_time_created = $row['date_time_created'];
        $unit_id = $row ['unit_id'];
        $room_id = $row ['room_id'];
        $amount = $row['payment_receive'];
        $payment_equity = $row ['payment_equity'];
        $payment_method = $row ['payment_method'];
        $d = strtotime($row['date_time_created']);
        date("M-d-Y", $d);


    }
}

$html.='

        <tbody>
            <tr>
                
                <td>'.date("M-d-Y", $d).' </td>
                <td>'.$unit_id.'</td>
                <td>'.$room_id.'</td>
                <td>'.$amount.'</td>
                <td>'.$payment_equity.'</td>
                <td>'.$payment_method.'</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

';



require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("sample pdf", array("Attachment" => 0));
?>

