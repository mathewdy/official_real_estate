<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);
if(isset($_POST['send'])){


    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['body'];

    try{
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mathewdalisay@gmail.com';
        $mail->Password = 'dproewbecisldhec';
        $mail->SMTPSecure = "tls";
        $mail->Port = '587';
        $mail->setFrom('mathewdalisay@gmail.com', 'Mathew Melendez');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        echo "Sent na sya";

    }catch(Exception $e){
        echo "Error" .$e->getMessage();
    }
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
    <form action="" method="POST">
        <label for="">Name</label>
        <br>
        <input type="text" name="name">
        <br>
        <label for="">Email</label>
        <br>
        <input type="email" name="email">
        <br>
        <label for="">Subject</label>
        <br>
        <input type="text" name="subject">
        <br>
        <label for="">Body</label>
        <br>
        <input type="text" name="body">
        <input type="submit" name="send" value="Send">
        
    </form>
</body>
</html>