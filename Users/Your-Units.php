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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/headers.css">
    <title>Real Estate Management</title>
</head>
<body>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
            <li><a href="Units.php" class="nav-link px-2 text-white">Buy Unit</a></li>
            <li><a href="Your-Units.php" class="nav-link px-2 text-secondary">Your Units</a></li>
            <li>    
           
        </ul>
        <div class="text-end">
           
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
            </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                        </svg>
                        Log Out
                    </a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>
  </header>
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

                //query 1
                $query = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
                home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created
                FROM units
                LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
                WHERE home_owners.user_id = '$user_id' AND home_owners.payment_equity = 'Reservation Fee' ";
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
            </tr>
        </thead>
        <tbody>
            <?php

                $query_statement_of_Account = "SELECT units.unit_id AS unit_id, units.model AS model, home_owners.room_id AS room_id, units.floor_area AS floor_area, units.total_price_contract AS total_price_contract, units.option_equity AS option_equity,
                home_owners.payment_receive AS payment_receive, home_owners.payment_method AS payment_method,  home_owners.unit_id , home_owners.user_id AS user_id , units.type AS type, home_owners.date_time_created AS date_time_created, home_owners.payment_equity AS payment_equity,home_owners.payment_status AS payment_status
                FROM units
                LEFT JOIN home_owners ON units.unit_id = home_owners.unit_id
                WHERE home_owners.user_id = '$user_id' ORDER BY home_owners.date_time_created DESC";
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
                            <td>
                                <?php 
                                    if($row_account['payment_equity'] == 'Option Equity'){
                                        echo "Monthly Fee";
                                    }else{
                                        echo "Reservation Fee";
                                    }
                                ?>
                            
                            </td>

                            <td>
                                <?php 
                                   
                                    if($row_account ['payment_status'] == '1'){
                                            echo $row_account ['payment_receive'];
                                    }else{
                                        echo "Pending";
                                    }
                                ?>
                            </td>
                            <td><?php echo $row_account['payment_method']?></td>
                            <td>

                                <?php
                                    if($row_account ['payment_status'] == '1'){
                                        echo '<a href="pdf.php?user_id=<?php echo $row_account [user_id]?>" target="_blank">Generate Invoice</a>';
                                    }else{
                                        echo "";
                                    }   
                                ?>
                            </td>
                            
                        </tr>

                        <?php
                    }
                }else{
                    echo "No Payments yet". $conn->error;
                }

            ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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