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
    <title>Document</title>
</head>
<body>

<?php

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $sql_user_edit_profile = "SELECT * FROM users WHERE user_id = '$user_id' ";
    $run_edit_profile = mysqli_query($conn,$sql_user_edit_profile);

    if(mysqli_num_rows($run_edit_profile) > 0){
        foreach($run_edit_profile as $row_profiles){
            ?>

                <label for="">First Name:</label>
                <input type="text" name="first_name" value="<?php echo $row_profiles['first_name']?>" required>
                <label for="">Middle Name:</label>
                <input type="text" name="middle_name" value="<?php echo $row_profiles['middle_name']?>" required>
                <label for="">Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $row_profiles['last_name']?>" required>
                <label for="">Contact Number:</label>
                <input type="text" name="contact_number" value="<?php echo $row_profiles['contact_number']?>" required>
                <label for="">Email:</label>
                <input type="text" name="email" value="<?php echo $row_profiles['email']?>">
            <?php
        }
    }
}


?>
    
</body>
</html>

<?php



ob_end_flush();

?>