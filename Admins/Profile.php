<?php
ob_start();
session_start();
if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}
include('../connection.php');
$username = $_SESSION['username'];


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
    
</body>

<a href="Home.php">Back</a>
    <h1>Profile</h1>
    
    <?php

        $query_profile = "SELECT * FROM admins WHERE username = '$username '";
        $run = mysqli_query($conn,$query_profile);

        if(mysqli_num_rows($run) > 0){
            foreach($run as $row ){
                ?>

                    <label for="">Name</label>
                    <p><?php echo $row ['name']?></p>
                    <label for="">Position</label>
                    <p>Admin</p>
                <?php
            }
        }
        

    ?>


</html>

<?php



ob_end_flush();

?>