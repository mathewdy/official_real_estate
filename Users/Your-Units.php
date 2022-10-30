<?php
ob_start();

include('../connection.php');
session_start();
if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}


//gagawa pa ako ng paybill nya hahaha putangina talagaaaa, tas pagination pa to hahaha yamot talaga bhie
$user_id = $_SESSION['user_id'];
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
    <a href="Home.php">Back</a>
    <h2>Your Units</h2>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Unit Id</th>
                <th>Room Id</th>
                <th>Model</th>
                <th>Type</th>
                <th>Floor Area</th>
                <th>Total Price Contract</th>
                <th>Your Monthy Equity</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $query = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
                home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created
                FROM units
                LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
                WHERE home_owners.user_id = '$user_id' AND home_owners.payment_equity = 'Reservation Fee'";
                $run = mysqli_query($conn,$query);

                if(mysqli_num_rows($run) > 0){
                    $no = 1;
                    foreach ($run as $row){
                        ?>
                        
                        <tr>
                            <form action="" method="POST">
                            <td><?php echo $no?></td>
                            <td>
                                <input type="text" name="unit_id" value="<?php echo $row ['unit_id']?>" readonly>
                            </td>
                            <td>
                               <input type="text" name="room_id" value="<?php echo $row ['room_id']?>"readonly>
                            </td>
                            <td>
                                
                                <input type="text" name="model" value="<?php echo $row ['model']?>"readonly>
                            </td>
                            <td>
                                <input type="text" name="type" value="<?php echo $row ['type']?>"readonly>
                            </td>
                            <td>
                                <input type="text" name="floor_area" value="<?php echo $row ['floor_area']?>"readonly>
                            </td>
                            <td>
                                <input type="text" name="total_price_contract" value="<?php echo $row ['total_price_contract']?>" readonly>   
                            </td>
                            <td>
                                <input type="text" name="option_equity" value="<?php echo $row ['option_equity']?>" readonly>
                            </td>
                                <input type="hidden" name="process" value="1" readonly>
                            <td>
                                <input type="submit" name="pay_room_id" value="Make a payment">
                            </td>
                            </form>
                        </tr>

                        <?php
                    $no++;
                    }
                }else{
                    echo "No Units yet" . $conn->error;
                }
            ?>
        </tbody>
    </table>

    <h3>Statement of Account</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Room ID</th>
                <th>Payment Status</th>
                <th>Payment Equity</th>
                <th>Your Pament</th>
                <th>Payment Method</th>
                <th>Total Price Contract</th>

            </tr>
        </thead>
        <tbody>
            <?php

                $query_statement_of_Account = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
                home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created, home_owners.payment_equity AS payment_equity,home_owners.payment_status AS payment_status
                FROM units
                LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
                WHERE home_owners.user_id = '$user_id'";
                $run_account = mysqli_query($conn,$query_statement_of_Account);

                if(mysqli_num_rows($run_account) > 0){
                    foreach($run_account as $row_account){
                        ?>

                        <tr>
                            <td>
                                <?php 
                                $d = strtotime($row_account['date_time_created']);
                                echo date("M-d-Y", $d);
                                ?>
                            </td>
                            <td><?php echo $row_account ['room_id']?></td>
                            <td>
                                <?php 
                                    if($row_account ['payment_status'] == '1'){
                                        echo "Payment Received";
                                    }else{
                                        echo "Pending";
                                    }
                                ?>
                            </td>
                            <td><?php echo $row_account['payment_equity']?></td>

                            <td><?php echo $row_account['payment_receive']?></td>
                            <td><?php echo $row_account['payment_method']?></td>
                            <td><?php echo $row_account['total_price_contract']?></td>
                            
                        </tr>

                        <?php
                    }
                }else{
                    echo "No Payments yet". $conn->error;
                }

            ?>
        </tbody>
    </table>

</body>
</html>

<?php

if(isset($_POST['pay_room_id'])){
    $unit_id = $_POST['unit_id'];
    $room_id = $_POST['room_id'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $floor_area = $_POST['floor_area'];
    $total_price_contract = $_POST['total_price_contact'];
    $option_equity = $_POST['option_equity'];
    $process = $_POST['process'];
    

    if($process == 1){
        $_SESSION['unit_id'] = $unit_id;
        $_SESSION['room_id'] = $room_id;
        $_SESSION['model'] = $model;
        $_SESSION['type'] = $type;
        $_SESSION['floor_area'] = $floor_area;
        $_SESSION['total_price_contract'] = $total_price_contract;
        $_SESSION['option_equity'] = $option_equity;
        header("Location: Your-Units-Payment.php");
    }else{
        echo "error" . $conn->error;
    }
}

ob_end_flush();
?>