<?php
ob_start();
include('../connection.php');
session_start();
if(empty($_SESSION['user_id'])){
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
            <li><a href="Your-Units.php" class="nav-link px-2 text-white">Your Units</a></li>
            <li>    
            <!-- Button trigger modal -->
            <li>
                <a href="" class="nav-link px-2 text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add Appointment</a>
            </li>
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
                        <label for="">Option Equity (36 months to Pay) No interest</label>
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
                        <input type="submit" name="next" class="btn btn-primary" value="Next">
                        <input type="hidden" name="process" value="1">
                        </form>
                  
                    <?php
                }
            }
        }

    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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