<?php
ob_start();
session_start();
include('../connection.php');
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}
// lagay ako ng LIMIT for numbers of condo etc etc

if(isset($_POST['add_unit'])){

    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    $unit_id = "2022".rand('1','10') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) ;

    $model = $_POST['model'];
    $type = $_POST['type'];
    $floor_area = $_POST['floor_area'];
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
    }else{
        
        if(file_exists("uploads/" .$_FILES['image']['name'])){
            $filename = $_FILES['image']['name'];
        }else{
            $query_insert_unit = "INSERT INTO units (unit_id,model,type,floor_area,available,total_price_contract,reservation_fee,net_equity,option_equity,bank_financing,image,date_time_created,date_time_updated) VALUES ('$unit_id', '$model','$type','$floor_area','$available', '$total_price_contract','$reservation_fee', '$net_equity', '$option_equity', '$bank_financing', '$image','$date $time', '$date $time')";
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