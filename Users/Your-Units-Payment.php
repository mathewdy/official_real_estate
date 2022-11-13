<?php
ob_start();

session_start();
include('../connection.php');
if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}
$_SESSION['unit_id'];
$_SESSION['room_id'] ;
$_SESSION['model'];
$_SESSION['type'];
$_SESSION['floor_area'] ;
$_SESSION['total_price_contract'] ;
$_SESSION['option_equity'];
$user_id = $_SESSION['user_id'];

$room_id = $_SESSION['room_id'];
echo $_SESSION['contact_number'] . '<br>';

echo $option_equity = $_SESSION['option_equity'];

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
    <a href="home.php">Cancel</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <h2>Pay Via</h2>
        <h3>You are about to pay:</h3>
        <p><?php echo $_SESSION['option_equity']?></p>
        <div id="paypal-payment-container"></div>
            <h3>Or</h3>
        <label for="">Online Deposit through our company bank account.</label>
        <br>
        <strong>
        PHOENIX SUN INTERNATIONAL CORP.
        <br>
        PHILIPPINES NATIONAL BANK – 7th Ave. Branch,BGC Taguig City
        <br>
        ACCOUNT NO. : 144-170001114
        </strong>
        <p>Then Send a proof of payment here!</p>
        <strong>Note: It will take a 3 business days for prior notice and you will recieve a confirmation details via email</strong>
        <br>
        <input type="file" name="image">
        <br>
        <input type="submit" name="proof_of_payment" value="Send Payment">
    </form>

    <?php
    
    $sql_remaining_balance = "SELECT units.total_price_contract, home_owners.payment_receive,
        (units.total_price_contract - SUM(home_owners.payment_receive)) AS remaining_balance
        FROM units
        LEFT JOIN 
        home_owners ON units.unit_id = home_owners.unit_id 
        WHERE user_id = '$user_id' AND home_owners.room_id = '$room_id' ";

    $run_remaining_balance = mysqli_query($conn,$sql_remaining_balance);

    if(mysqli_num_rows($run_remaining_balance) > 0){
        foreach($run_remaining_balance as $row){
            ?>
                <h4>Your Remaining balance is...</h4> <p><?php echo $row ['remaining_balance']?></p>
            <?php
        }
    }
    
    ?>
</body>

<script src="https://www.paypal.com/sdk/js?client-id=AUj--PBoyv8NYabpajfLbebT3-ExaJXgFn2LoBUIGERgjCigCsoDE5v0Jh8-Fu3UuebksnggnF5eauT4&currency=PHP"></script>
</script>
    <script>
        paypal.Buttons({
            createOrder: function(data,actions){
                return actions.order.create({
                    purchase_units:[
                        {
                            amount:{
                                value:'<?php echo $option_equity ?>'
                            }
                        }
                    ]
                });
            },
            onApprove: function(data,actions){
        return actions.order.capture().then(function(details){

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/official_real_estate/Users/Success-Monthly-Payment.php")

        })
    }
        }).render('#paypal-payment-container');        
    </script>
</html>


<?php
if(isset($_POST['proof_of_payment'])){
    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');
    $image = $_FILES['image']['name'];
    $payment_method = 'Online Deposit';
    $payment_equity = 'Option Equity';
    $user_id = $_SESSION['user_id'];
    $unit_id = $_SESSION['unit_id'];
    $payment_receive = $_SESSION['reservation_fee'];
    $payment_status = '0';
    $room_id = $_SESSION['room_id'] ;


    //allowed files
    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='Payment.php'</script>";
    }else{
        
        if(file_exists("monthly-payments/" .$_FILES['image']['name'])){
            $filename = $_FILES['image']['name'];
        }else{
            $query_home_owners = "INSERT INTO home_owners (user_id,unit_id,room_id,payment_receive,payment_equity,payment_method,payment_status,date_time_created,date_time_updated) VALUES ('$user_id', '$unit_id','$room_id','$payment_receive','$payment_equity', '$payment_method', '$payment_status','$date $time' , '$date $time')";
            $sql_home_owners = mysqli_query($conn,$query_home_owners);
            if($sql_home_owners){
                move_uploaded_file($_FILES["image"]["tmp_name"], "monthly-payments/".$_FILES["image"]["name"]);

                echo "<script>alert('Monthly Payment Success for room $room_id '); </script>";
                echo "<script>window.location.href='Your-Units.php'</script>";
            }else{
                echo "error" .$conn->error;
            }
        }
    }
}
ob_end_flush();
?>