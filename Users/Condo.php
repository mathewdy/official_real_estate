<?php
ob_start();
session_start();
include('connection.php');
if(empty($_SESSION['user_id'])){
    echo "<script>window.location.href='Login.php'</script>";
}

//gagawa din ako ng pagination
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
    <!-------dito sa condo, dapat naka loop lahat ng mga ininput na condo mula sa admin--->

    <!------- naka card dapat yung mga units dito---->

    <?php

        $sql = "SELECT * FROM units";
        $run = mysqli_query($conn,$sql);

        if($run){
            if(mysqli_num_rows($run) > 0){
                foreach($run as $row){
                    ?>

                        <label for="">Model</label>
                        <p><?php echo $row ['model']?></p>

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