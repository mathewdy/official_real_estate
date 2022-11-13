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
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#" style="font-family: 'Allura', cursive; font-weight: 800; font-size: 2.3em;">El Pueblo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    <a class="nav-link px-3 fw-bold" href="../index.php" style="font-family: 'Poppins', sans-serif; font-size: 1em;">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link px-3 fw-bold" href="../index.php#About" style="font-family: 'Poppins', sans-serif; font-size: 1em;">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link px-3 fw-bold" href="../index.php#Faq" style="font-family: 'Poppins', sans-serif; font-size: 1em;">FAQ</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
<div class="container my-5">


<?php

if(isset($_GET['unit_id'])){

    $unit_id = $_GET['unit_id'];
    $sql = "SELECT * FROM units WHERE unit_id = '$unit_id'";
    $run = mysqli_query($conn,$sql);




    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row p-5">
                    <div class="col-lg-6 text-center">
                        <img src="<?php echo "../Admins/uploads/".$row['image']?>" width="500px" height="500px" alt="image">
                        <input type="hidden" name="old_image" value="<?php echo $row ['image']?>">
                    </div>
                    <div class="col-lg-6">
                        <input type="hidden" name="unit_id" value="<?php echo $row ['unit_id']?>" readonly>
                        <div class="row py-5">
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Model:</label>
                                <input type="text" name="model" class="h4" style="border:none; outline: none;" value="<?php echo $row ['model']?>" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Type:</label>
                                <input type="text" name="type" class="h4" style="border:none; outline: none;" value="<?php echo $row ['type']?>" readonly >
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Available Units:</label>
                                <input type="number" name="available" class="h4" style="border:none; outline: none;" value="<?php echo $row ['available']?>" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Total price Contract:</label>
                                <input type="number" name="total_price_contract" class="h4" style="border:none; outline: none;" value="<?php echo $row ['total_price_contract']?>" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Reservation Fee:</label>
                                <input type="number" name="reservation_fee" class="h4" style="border:none; outline: none;" value="<?php echo $row ['reservation_fee']?>" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Net Equity:</label>
                                <input type="number" name="net_equity" class="h4" style="border:none; outline: none;" value="<?php echo $row ['net_equity']?>" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Option Equity: </label>
                                <input type="number" class="h4" style="border:none; outline: none;" value="<?php echo $row ['option_equity']?>" name="option_equity" readonly>
                            </div>
                            <div class="col-lg-12 d-flex justify-content-between">
                                <label for="" class="fw-bold h3">Bank Financing:</label>
                                <input type="number" name="bank_financing" class="h4" style="border:none; outline: none;" value="<?php echo $row ['bank_financing']?>" readonly>
                            </div>
                            <div class="col-lg-12 mt-5">
                                <input type="submit" class="btn btn-md btn-dark" style="border-radius: 0;" name="get_unit" value="Get Unit">
                                <a href="../index.php" class="btn btn-md btn-secondary" style="border-radius: 0;">Cancel</a>
                                <input type="hidden" name="process" value="1">
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                </form>
            <?php
        }
    }
}

?>

</div>
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
    $room_id  = "C3".rand('11','30') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);



    
    if($process == 1){
        $_SESSION['unit_id'] = $unit_id;
        $_SESSION['model'] = $model;
        $_SESSION['type'] = $type;
        $_SESSION['floor_area'] = $floor_area;
        $_SESSION['total_price_contract'] = $total_price_contract;
        $_SESSION['option_equity'] = $option_equity;
        $_SESSION['bank_financing'] = $bank_financing;
        $_SESSION['reservation_fee'] = $reservation_fee;
        $_SESSION['room_id'] = $room_id;
        header("Location: Registration.php");
    }else{
        echo "error" . $conn->error;
    }
}



ob_end_flush();
?>