<?php
ob_start();
session_start();
include('../connection.php');

if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php' </script>";
}
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
    <a href="Home.php">Back</a>
    <h1>Available Units</h1>

    <!----dapat siguro card to na hoverable---->

    <?php

        $sql = "SELECT * FROM units";
        $run = mysqli_query($conn,$sql);

        if($run){
            if(mysqli_num_rows($run) > 0){
                foreach($run as $row){
                    ?>
                        
                        <label for="">Unit Model</label>
                        <br>
                        <p><?php echo $row ['model']?></p>
                        <br>
                        <label for="">Type</label>
                        <br>
                        <p><?php echo $row ['type']?></p>
                        <br>
                        <label for="">Floor Area</label>
                        <br>
                        <p><?php echo $row ['floor_area']?></p>
                        <br>
                        <label for="">Available</label>
                        <br>
                        <p>
                            <?php
                                if($row ['available'] == '0'){
                                    echo "Not available";
                                }else{
                                    echo $row ['available'];
                                }
                            ?>
                        </p>
                        <label for="">Image</label>
                        <br>
                        <img src="<?php echo "../Admins/uploads/". $row['image']?>" alt="Image" width="100px" height="100px">
                        <br>
                        <a href="Unit-Details.php?unit_id=<?php echo $row ['unit_id']?>">View Details</a>
                        <br>
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