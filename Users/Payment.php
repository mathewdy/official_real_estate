<?php
ob_start();

include('../connection.php');
session_start();
if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}

$_SESSION['user_id'] ;
$_SESSION['unit_id'] ;
$_SESSION['reservation_fee'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Payment</title>
</head>
<body>
<div class="container p-5 shadow mt-5">
    <form action="" method="POST" enctype="multipart/form-data">
        <span class="d-flex justify-content-between">
            <h2>Pay Via</h2>
            <a href="home.php" class="btn-close"></a>

        </span>
        <h3>You are about to pay : <?php echo '₱'. $_SESSION['reservation_fee']?></h3>
        <div class="row">
            <div class="col-lg-5 d-flex align-items-center">
                <div id="paypal-payment-button" class="w-100"></div>
            </div>
            <div class="col-lg-2 text-center d-flex justify-content-center align-items-center">
                <h3>Or</h3>
            </div>
            <div class="col-lg-5">
                <label for="" class="h5">Online Deposit through our company bank account.</label>
                <br>
                <strong>
                PHOENIX SUN INTERNATIONAL CORP.
                <br>
                PHILIPPINES NATIONAL BANK – 7th Ave. Branch,BGC Taguig City
                <br>
                ACCOUNT NO. : 144-170001114
                </strong>
                <p>Then Send a proof of payment here!</p>
                <strong class="text-danger">Note: It will take a 3 business days for prior notice and you will recieve a confirmation details via email</strong>
                <br>
                <input type="file" class="form-control" name="image">
                <br>
                <input type="submit" name="proof_of_payment" class="btn btn-md btn-primary" style="border-radius: 0;" value="Send Payment">
            </div>
        </div>
    </form>
</div>
    
</body>
</html>


<script src="https://www.paypal.com/sdk/js?client-id=AYa-7RBfwKBTKHH_iVn1c5R5Y8I3MxjiiKKDqaca6se6bBWlu_DaR4590zyiAKe0uVKzoooGPOSfhY9c&currency=PHP"></script>
<script>
     
    paypal.Buttons({
        createOrder: function(data,actions){
            return actions.order.create({
                purchase_units:[{
                amount: {
                    value:'<?php echo $_SESSION['reservation_fee']?>'
                }
            }]
        });
    },
    onApprove: function(data,actions){
        return actions.order.capture().then(function(details){

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/official_real_estate/Users/Success.php")
            

        })
    }
    }).render('#paypal-payment-button');
   
</script>

<?php
if(isset($_POST['proof_of_payment'])){
    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');
    $image = $_FILES['image']['name'];
    $payment_method = 'Online Deposit';
    $payment_equity = 'Reservation Fee';
    $user_id = $_SESSION['user_id'];
    $unit_id = $_SESSION['unit_id'];
    $payment_receive = $_SESSION['reservation_fee'];
    $payment_status = '0';
    $room_id_1  = "C3".rand('11','30') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);

    //allowed files
    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='Payment.php'</script>";
    }else{
        
        if(file_exists("payments/" .$_FILES['image']['name'])){
            $filename = $_FILES['image']['name'];
        }else{
            $query_home_owners = "INSERT INTO home_owners (user_id,unit_id,room_id,payment_receive,payment_equity,payment_method,payment_status,date_time_created,date_time_updated) VALUES ('$user_id', '$unit_id','$room_id_1','$payment_receive','$payment_equity', '$payment_method', '$payment_status','$date $time' , '$date $time')";
            $sql_home_owners = mysqli_query($conn,$query_home_owners);
            if($sql_home_owners){
                move_uploaded_file($_FILES["image"]["tmp_name"], "payments/".$_FILES["image"]["name"]);
                echo "<script>alert('Added Unit'); </script>";
                echo "<script>window.location.href='Your-Units.php'</script>";
            }else{
                echo "error" .$conn->error;
            }
        }
    }
}

ob_end_flush();

?>