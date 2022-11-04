<?php
ob_start();
session_start();
include('../connection.php');

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

<a href="../index.php">Back</a>
    
<?php

if(isset($_GET['unit_id'])){

    $unit_id = $_GET['unit_id'];
    $sql = "SELECT * FROM units WHERE unit_id = '$unit_id'";
    $run = mysqli_query($conn,$sql);




    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="unit_id" value="<?php echo $row ['unit_id']?>" readonly>
                <label for="">Model</label>
                <br>
                <input type="text" name="model" value="<?php echo $row ['model']?>" readonly>
                <br>
                <label for="">Type</label>
                <br>
                <input type="text" name="type" value="<?php echo $row ['type']?>" readonly >
                <br>
                <label for="">Available Units</label>
                <br>
                <input type="number" name="available" value="<?php echo $row ['available']?>" readonly>
                <br>
                <label for="">Total price Contract</label>
                <br>
                <input type="number" name="total_price_contract" value="<?php echo $row ['total_price_contract']?>" readonly>
                <br>
                <label for="">Reservation Fee</label>
                <br>
                <input type="number" name="reservation_fee" value="<?php echo $row ['reservation_fee']?>" readonly>
                <br>
                <label for="">Net Equity</label>
                <br>
                <input type="number" name="net_equity" value="<?php echo $row ['net_equity']?>" readonly>
                <br>
                <label for="">Option Equity</label>
                <br>
                <input type="number" value="<?php echo $row ['option_equity']?>" name="option_equity" readonly>
                <br>
                <label for="">Bank Financing</label>
                <br>
                <input type="number" name="bank_financing" value="<?php echo $row ['bank_financing']?>" readonly>
                <br>
                <label for="">Image</label>
                <br>
                <input type="hidden" name="old_image" value="<?php echo $row ['image']?>">

                <br>
                <img src="<?php echo "../Admins/uploads/".$row['image']?>" width="100px" height="100px" alt="image">
                <br>
                <input type="submit" name="get_unit" value="Get Unit">
                <input type="hidden" name="process" value="1">
                </form>
            <?php
        }
    }
}

?>


</body>
</html>


<?php

if(isset($_POST['get_unit'])){

    $unit_id = $_POST['unit_id'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $floor_area = $_POST['floor_area'];
    $total_price_contract = $_POST['total_price_contact'];
    $option_equity = $_POST['option_equity'];
    $reservation_fee = $_POST['reservation_fee'];
    $process = $_POST['process'];


    
    if($process == 1){
        $_SESSION['unit_id'] = $unit_id;
        $_SESSION['model'] = $model;
        $_SESSION['type'] = $type;
        $_SESSION['floor_area'] = $floor_area;
        $_SESSION['total_price_contract'] = $total_price_contract;
        $_SESSION['option_equity'] = $option_equity;
        $_SESSION['bank_financing'] = $bank_financing;
        $_SESSION['reservation_fee'] = $reservation_fee;
        header("Location: Registration.php");
    }else{
        echo "error" . $conn->error;
    }
}



ob_end_flush();
?>