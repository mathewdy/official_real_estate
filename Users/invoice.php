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
    <p><strong>Date:</strong> <?= $date = date('M-d-Y',strtotime($rows['date_time_created'])) ?></p>
    <p><strong>Remaining Balance:</strong> <?= $row['remaining_balance'] ?></p>

    <h3>Name:</h3><p><strong><?= $rows['first_name'] . ' '. $rows['middle_name'] . ' ' . $rows['last_name'] ?></strong></p>

    <table>
        <thead>
            <th>Unit ID</th>
            <th>Room ID</th>
            <th>Amount</th>
            <th>Payment Method</th>
        </thead>
        <tbody>
                <td><?= $rows['unit_id']?></td>
                <td><?= $rows['room_id']?></td>
                <td><?= $rows['payment_receive']?></td>
                <td><?= $rows['payment_method']?></td>
        </tbody>
    </table>

    -------------------------------------------------------------------------------------------

    <h3>
    For Inquiries, Contact Us
    </h3>
    <p>
    Phoenix Sun International Corp. Developer
    </p>
    <p>
    Main Office Address: Unit 801 One Park Drive Bldg. 9th Ave. corner 11th Drive Bonifacio Global City,Taguig City
    </p>
    <p>
    sales.elpueblocondominium@gmail.com / info.elpueblomarketingdoc88@gmail.com
    </p>
    <p>
    Manila Showroom
    </p>
    <p>
    Main Office Tel Nos. (02) 792-7910 / 09190088650
    </p>
    <p>
    Like us: https://www.facebook.com/elpueblocondormitel.Official 
    </p>

</p>

</body>
</html>