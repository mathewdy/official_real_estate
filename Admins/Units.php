<?php
ob_start();
session_start();
include('../connection.php');

if(empty($_SESSION['username'])){
    echo "<script>window.location.href='Login.php' </script>";
}
// gagawa naman akong inventory sa susunod
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
<a href="AddUnit.php">Add unit</a>

    <h1>Units</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Model</th>
                <th>Type</th>
                <th>Available Units</th>
                <th>Total Price Contract</th>
                <th>Reservation Fee</th>
                <th>Net Equity</th>
                <th>Option Equity</th>
                <th>Bank Financing</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

                $query_select = "SELECT * FROM units";
                $run_select = mysqli_query($conn,$query_select);

                if(mysqli_fetch_array($run_select) > 0){
                    $no = 1;
                    foreach($run_select as $row){
                  
                        
                        
                        ?>
                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $row ['model']?></td>
                                <td><?php echo $row ['type']?></td>
                                <td><?php echo $row ['available']?></td>
                                <td><?php echo $row ['total_price_contract']?></td>
                                <td><?php echo $row ['reservation_fee']?></td>
                                <td><?php echo $row ['net_equity']?></td>
                                <td><?php echo $row ['option_equity']?></td>
                                <td><?php echo $row ['bank_financing']?></td>
                                <td>
                                    <img src="<?php echo "uploads/". $row['image']?>" alt="Image" width="100px" height="100px">
                                </td>
                                <td>
                                    <a href="Edit-Unit.php?unit_id=<?php echo $row ['unit_id']?>">Edit</a>
                                </td>
                                <td>
                                    <a href="Delete-Unit.php?unit_id=<?php echo $row ['unit_id']?>">Delete</a>
                                </td>

                            </tr>


                        <?php
                   $no++; 
                    }
                
                }

            ?>

        </tbody>
    </table>
    
</body>
</html>

<?php
ob_end_flush();

?>