<?php
ob_start();
session_start();
include('../connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}
// lagay ako ng LIMIT for numbers of condo etc etc
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
    <h1>Create Unit</h1>

    <a href="Units.php">Back</a>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Model</label>
        <br>
        <input type="text" name="model">
        <br>
        <label for="">Type</label>
        <br>
        <input type="text" name="type">
        <br>
        <label for="">Number of Available Units</label>
        <br>
        <input type="number" name="available">
        <label for="">Total Price Contract</label>
        <br>
        <input type="number" name="total_price_contract">
        <br>
        <label for="">Reservation Fee</label>
        <br>
        <input type="number" name="reservation_fee">
        <br>
        <label for="">Net Equity</label>
        <br>
        <input type="number" name="net_equity">
        <br>
        <label for="">Option Equity</label>
        <br>
        <input type="number" name="option_equity">
        <br>
        <label for="">Bank Financing</label>
        <br>
        <input type="number" name="bank_financing">
        <br>
        <label for="">Image</label>
        <br>
        <input type="file" name="image" id="" >
        <br>
        <input type="submit" name="add_unit" value="Add Unit">
    </form>

</body>
</html>

<?php

if(isset($_POST['add_unit'])){

    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    $unit_id = "2022".rand('1','10') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) ;

    $model = $_POST['model'];
    $type = $_POST['type'];
    $available = $_POST['available'];
    $total_price_contract = $_POST['total_price_contract'];
    $reservation_fee = $_POST['reservation_fee'];
    $net_equity = $_POST['net_equity'];
    $option_equity = $_POST['option_equity'];
    $bank_financing = $_POST['bank_financing'];
    //image
    $image = $_FILES['image']['name'];

    $query_condo = "SELECT * FROM units WHERE model='$model' AND type='$type'";
    $run_condo = mysqli_query($conn,$query_condo);
    
    if(mysqli_num_rows($run_condo) > 0){
        echo "<script>alert('Unit Already Added')</script>";
        exit();
    }


    //allowed files
    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='AddUnit.php'</script>";
    }else{
        
        if(file_exists("upload/" .$_FILES['image']['name'])){
            $filename = $_FILES['image']['name'];
        }else{
            $query_insert_unit = "INSERT INTO units (unit_id,model,type,available,total_price_contract,reservation_fee,net_equity,option_equity,bank_financing,image,date_time_created,date_time_updated) VALUES ('$unit_id', '$model','$type','$available', '$total_price_contract','$reservation_fee', '$net_equity', '$option_equity', '$bank_financing', '$image','$date $time', '$date $time')";
            $sql_insert_unit = mysqli_query($conn,$query_insert_unit);
        
            if($sql_insert_unit){
                move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
                echo "<script>alert('added unit') </script>";
                echo "<script>window.location.href='Units.php'</script>";
            }else{
                echo "error" .$conn->error;
            }
        }
    }

}




ob_end_flush();

?>