<?php

include('../connection.php');
session_start();
ob_start();

$user_id = $_SESSION['user_id'];

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;


$sql = "SELECT users.first_name, users.middle_name, users.last_name ,users.email, home_owners.user_id, home_owners.unit_id, home_owners.room_id,home_owners.payment_receive, home_owners.payment_equity, home_owners.payment_method, home_owners.payment_status,  home_owners.date_time_created
FROM users
LEFT JOIN home_owners 
ON users.user_id = home_owners.user_id
WHERE users.user_id = '2022953074'";

$run = mysqli_query($conn,$sql);

if(mysqli_num_rows($run) > 0){
    foreach($run as $row){
        $html = '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Unit ID</th>
                <th>Room ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Payment Equity</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td>'.$row['first_name'].'</td>
                <td>mathewdalisay@gmail.com</td>
                <td>sample unit id</td>
                <td>sample room id</td>
                <td>oct 1 2000</td>
                <td>2000</td>
                <td>Reservation</td>
                <td>Paypal</td>
            </tr>
        </tbody>
</table>';
    }
}
?>


        
           
</body>
</html>


<?php

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('invoice.pdf');

ob_end_flush();


?>