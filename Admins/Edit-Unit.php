<?php
session_start();
ob_start();
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


    <a href="Units.php">Cancel</a>

    <br>
    <?php
    if(isset($_GET['unit_id'])){

        $unit_id = $_GET['unit_id'];
        $sql = "SELECT * FROM units WHERE unit_id = '$unit_id'";
        $run = mysqli_query($conn,$sql);
    
    
    

    if(mysqli_num_rows($run) > 0){
        foreach($run as $row){
            ?>
            <form action="Edit-Unit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="unit_id" value="<?php echo $row ['unit_id']?>">
                <label for="">Model</label>
                <br>
                <input type="text" name="model" value="<?php echo $row ['model']?>">
                <br>
                <label for="">Type</label>
                <br>
                <input type="text" name="type" value="<?php echo $row ['type']?>" >
                <br>
                <label for="">Available Units</label>
                <input type="number" name="available" value="<?php echo $row ['available']?>">
                <label for="">Total price Contract</label>
                <br>
                <input type="number" name="total_price_contract" value="<?php echo $row ['total_price_contract']?>">
                <br>
                <label for="">Reservation Fee</label>
                <br>
                <input type="number" name="reservation_fee" value="<?php echo $row ['reservation_fee']?>" >
                <br>
                <label for="">Net Equity</label>
                <br>
                <input type="number" name="net_equity" value="<?php echo $row ['net_equity']?>">
                <br>
                <label for="">Option Equity</label>
                <br>
                <input type="number" value="<?php echo $row ['option_equity']?>" name="option_equity">
                <br>
                <label for="">Bank Financing</label>
                <br>
                <input type="number" name="bank_financing" value="<?php echo $row ['bank_financing']?>">
                <br>
                <label for="">Image</label>
                <br>
                <input type="file" name="image">
                <br>
                <input type="hidden" name="old_image" value="<?php echo $row ['image']?>">

                <br>
                <img src="<?php echo "uploads/".$row['image']?>" width="100px" height="100px" alt="image">
                <br>
                <input type="submit" name="update" value="Update">
                </form>
            <?php
        }
    }
}
    ?>


    

</body>
</html>


<?php
if(isset($_POST['update'])){


    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    $unit_id = $_POST['unit_id'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $total_price_contract = $_POST['total_price_contract'];
    $reservation_fee = $_POST['reservation_fee'];
    $net_equity = $_POST['net_equity'];
    $option_equity = $_POST['option_equity'];
    $bank_financing = $_POST['bank_financing'];

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != ''){
        $update_filename = $_FILES['image']['name'];
    }else{
        $update_filename = $old_image;
    }
    
    
    $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        echo "<script>alert('File not allowed'); </script>";
        echo "<script>window.location.href='Units.php'</script>";
    }else{
        
        $query_update = "UPDATE units SET model = '$model', type='$type', total_price_contract = '$total_price_contract' , reservation_fee = '$reservation_fee', net_equity = '$net_equity', bank_financing = '$bank_financing', image = '$update_filename', date_time_updated = '$date $time' WHERE unit_id = '$unit_id' ";
        $run_update = mysqli_query($conn,$query_update);

        if($run_update){
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
            unlink("uploads/". $old_image);
            echo "updated";
            // echo "<script>alert('Updated Unit') </script>";
            // echo "<script>window.location.href='Units.php' </script>";
        }else{
            echo "error" . $conn->error;
        }
        
    }
    
}


ob_end_flush();



?>