<?php
ob_start();
session_start();
include('../connection.php');
if(isset($_GET['unit_id'])){
    $unit_id = $_GET['unit_id'];

    $query = "DELETE FROM units WHERE unit_id = '$unit_id' ";
    $run = mysqli_query($conn,$query);

    if($run){
        echo "<script>alet('Unit Deleted') </script>";
        echo "<script>windows.location.href='Units.php' </script>";
    }else{
        echo "error " . $conn->error;
    }

}


?>