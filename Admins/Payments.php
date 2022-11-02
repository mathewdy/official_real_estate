<?php

include('../connection.php');
session_start();
ob_start();


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
    <table>
        <thead>
            <tr>
                <td>No.</td>
                <td>Full Name</td>
                <td>Room ID</td>
                <td>Payment Recieve</td>
                <td>Payment Equity</td>
                <td>Payment Method</td>
                <td>Payment Status</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php


                $sql = "SELECT users.user_id, users.first_name, users.last_name,
                home_owners.room_id,home_owners.payment_receive,home_owners.payment_equity,
                home_owners.payment_method,home_owners.payment_status,home_owners.date_time_created 
                FROM users
                LEFT JOIN home_owners 
                ON users.user_id = home_owners.user_id
                WHERE home_owners.payment_method = 'Online Deposit' OR home_owners.payment_method = 'Paypal'";
                $run = mysqli_query($conn,$sql);

                if(mysqli_num_rows($run) > 0){
                    $no = 1;
                    foreach($run as $row){
                        ?>

                            <tr>
                                <td><?php echo $no?></td>
                                <td><?php echo $row ['first_name'] . $row ['last_name']?></td>
                                <td><?php echo $row ['room_id']?></td>
                                <td>
                                    <?php 
                                        if($row['payment_status'] == '1'){
                                            echo $row['payment_receive'];
                                        }else{
                                            echo "Pending";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['payment_equity']?></td>
                                <td><?php echo $row['payment_method']?></td>
                                <td>
                                    <?php 

                                        if($row['payment_status'] == '1'){
                                            echo "Payment Received";
                                        }else{
                                            echo "Pending";
                                        }
                                    ?>
                                    </td>
                                <td>
                                    <?php 
                                    echo date("M-d-Y", strtotime($row['date_time_created']));
                                    ?>
                                </td>
                                <td>
                                    
                                    <?php

                                        if($row['payment_status'] == '0'){
                                            echo "<a href='Edit-Payment-Status.php'>Edit</a>";
                                            //hindi pa to tapos haha , gagawa ako dito ng edit payment , if ma confirm yung image

                                            // once na na confirm ko na yung payment is na recieved babalik ako kay users para mag lagay ng if statement kung na confirm na yung bayad mag gegenerate ng invoice, if ever na hindi pa. wag muna
                                        }else{
                                            echo "";
                                        }

                                    ?>
                                    
                                    
                                </td>
                            </tr>

                        <?php
                    
                $no++;}
                }


            ?>
        </tbody>
    </table>
</body>
</html>

<?php


ob_end_flush();


?>