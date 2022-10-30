<?php
ob_start();
include('../connection.php');
session_start();
if(empty($_SESSION['email'])){
    echo "<script>window.location.href='Login.php' </script>";
}

// since gumagana na yung unit details, dapat ipapasok ko naman sya sa database
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
    <a href="Units.php">Back</a>
    <br>
    <?php

        if(isset($_GET['unit_id'])){
            $unit_id = $_GET['unit_id'];

            $sql = "SELECT * FROM units WHERE unit_id = '$unit_id'";
            $run = mysqli_query($conn,$sql);


            

            if(mysqli_num_rows($run) > 0){
                foreach($run as $row){

                    if($row ['available'] == '0'){
                        echo "<script>alert('Not available'); </script>";
                        echo "<script>window.location.href='Units.php' </script>";
                    }

                    ?>

                        <form action="" method="POST">

                        <label for="">Unit Model</label>
                        <br>
                        <input type="text" name="model" value="<?php echo $row ['model']?>" readonly>
                        <br>
                        <label for="">Type</label>
                        <br>
                        <input type="text" name="type" value="<?php echo $row ['type']?>"readonly>
                        <br>
                        <label for="">Available Units</label>
                        <br>
                        <input type="text" name="available_units" value="<?php echo $row ['available']?>"readonly>
                        <br>
                        <label for="">Total Price Contract</label>
                        <br>
                        <input type="text" name="total_price_contract" value="<?php echo $row ['total_price_contract']?>"readonly>
                        <br>
                        <label for="">Reservation Fee</label>
                        <br>
                        <input type="text" name="reservation_fee" value="<?php echo $row ['reservation_fee']?>"readonly>
                        <br>
                        <label for="">Net Equity</label>
                        <br>
                        <input type="text" name="net_equity" value="<?php echo $row ['net_equity']?>"readonly>
                        <br>
                        <label for="">Option Equity (36 monthsto Pay) No interest</label>
                        <br>
                        <input type="text" name="option_equity" value="<?php echo $row ['option_equity']?>"readonly>
                        <br>
                        <label for="">80% Bank Financing</label>
                        <br>
                        <input type="text" name="bank_financing" value="<?php echo $row ['bank_financing']?>"readonly>
                        <br>
                        <label for="">Image</label>
                        <br>
                        <img src="<?php echo "../Admins/uploads/". $row['image']?>" alt="Image" width="100px" height="100px">
                        <br>
                        <input type="hidden" name="unit_id" value="<?php echo $row ['unit_id']?>">
                        <input type="submit" name="next" value="Next">
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
if(isset($_POST['next'])){
    // to continue tomorrow, 
    $unit_id = $_POST['unit_id'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $available_units = $_POST['available_units'];
    $total_price_contract = $_POST['total_price_contract'];
    $reservation_fee = $_POST['reservation_fee'];
    $net_equity = $_POST['net_equity'];
    $option_equity = $_POST['option_equity'];
    $bank_financing = $_POST['bank_financing'];
    $process = $_POST['process'];

    if($process == 1){
        $_SESSION['unit_id'] = $unit_id;
        $_SESSION['model'] = $model;
        $_SESSION['type'] = $type;
        $_SESSION['available_units'] = $available_units;
        $_SESSION['total_price_contract'] = $total_price_contract;
        $_SESSION['reservation_fee'] = $reservation_fee;
        $_SESSION['net_equity'] = $net_equity;
        $_SESSION['option_equity'] = $option_equity;
        $_SESSION['bank_financing'] = $bank_financing;
        header("Location: Payment.php");
    }else{
        echo "error" . $conn->error;
    }
}


ob_end_flush();

?>