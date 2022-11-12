<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <h2>Official Receipt</h2>
    <h3>El Pueblo Codominium</h3>
    <p>King Christian St. Kingspoint Subd. Brgy. Bagbag </p>
    <p>Novaliches Quezon City, Quezon City, Philippines</p>
    <p>Date: <?= $date = date('M-d-Y',strtotime($rows['date_time_created'])) ?></p>
    <p>Remaining Balance: <?= $row['remaining_balance'] ?></p>

    <table>
        <thead>
            <th>Name</th>
            <th>Unit ID</th>
            <th>Room ID</th>
            <th>Amount</th>
            <th>Payment Method</th>
        </thead>
        <tbody>
            <tr>
                <td><?= $rows['first_name'] . ' '. $rows['middle_name'] . ' ' . $rows['last_name'] ?></td>
                <td><?= $rows['unit_id']?></td>
                <td><?= $rows['room_id']?></td>
                <td><?= $rows['payment_receive']?></td>
                <td><?= $rows['payment_method']?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>