<?php
ob_start();
include('../connection.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;

function sendMail($email,$v_token){
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);



   //email token sent 
   try{
        
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mathewdalisay@gmail.com';
    $mail->Password = 'dproewbecisldhec';
    $mail->SMTPSecure = "tls";
    $mail->Port = '587';
    $mail->setFrom('mathewdalisay@gmail.com', 'El Pueblo One');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Email Verification';
    $mail->Body = "Hello! <h2> In order to finish all of the details please click the link to activate your account, thank you </h2>.
    
    <a href='http://$_SERVER[SERVER_NAME]/official_real_estate/Users/verify-email.php?v_token=$v_token'>Click me </a>
    
    ";

    $mail->send();
    $_SESSION['user_id'] = $user_id;
    echo "<script>alert('Check your spam or junk mails for confirmation') </script>";
    echo "<script>window.location.href='security-questions.php'</script>";


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
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="card shadow" style="border:none;">

    
    <form action="Registration.php" method="POST">

        <div class="row p-5">
    <h1>Registration</h1>

            <div class="col-lg-6">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name" >
            </div>
            <div class="col-lg-6">
            <label for="">Middle Name</label>
        <input type="text" class="form-control" name="middle_name" >
            </div>
            <div class="col-lg-6">
            <label for="">Last Name</label>
        <input type="text" class="form-control" name="last_name" >
            </div>
            <div class="col-lg-6">
            <label for="">Residence Address</label>
        <input type="text" class="form-control" name="residence_address" >
            </div>
            <div class="col-lg-6">
            <label for="">Permanent Address </label>
        <input type="text" class="form-control" name="permanent_address" >
            </div>
            <div class="col-lg-6">
            <label for="">Provincial Address</label>
        <input type="text" class="form-control" name="provincial_address" >
            </div>
            <div class="col-lg-6">
            <label for="">Birthdate</label>
        <input type="date" class="form-control" name="birthdate" >
            </div>
            <div class="col-lg-6">
            <label for="">Age </label>
        <input type="number" name="age" class="form-control">
            </div>
            <div class="col-lg-6">
            <label for="">Civil Status</label>
            <select name="civil_status" class="form-select"> 
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Separated">Separated</option>
                <option value="Widowed">Widowed</option>
                <option value="Civil Partnership">Civil Partnership</option>
            </select>
            </div>
            <div class="col-lg-6">
            <label for="">Name of Spouse </label>
        <input type="text" class="form-control" name="name_of_spouse" >
            </div>
            <div class="col-lg-6">
            <label for="">Name of Father </label>
        <input type="text" class="form-control" name="name_of_father" >
            </div>
            <div class="col-lg-6">
            <label for="">Name of Mother</label>
        <input type="text" class="form-control" name="name_of_mother">
            </div>
            <div class="col-lg-6">
            <label for="">Number of Dependents </label>
        <input type="number" class="form-control" name="number_of_dependents" id="">
            </div>
            <div class="col-lg-6">
            <label for="" class="w-100 mb-2">Owned or Rented</label>
        <input type="radio" name="owned" id="" value="Owned"> Owned
        <input type="radio" name="owned" id="" value="Rented"> Rented
            </div>
            <div class="col-lg-6">
            <label for="">Contact Number</label>
        <input type="number" class="form-control"name="contact_number">
            </div>
            <div class="col-lg-6">
            <label for="" class="mb-2 w-100">Gender</label>
        <br>
        <input type="radio" name="gender" id="" value="Male"> Male
        <input type="radio" name="gender" id="" value="Female"> Female
            </div>
            <div class="col-lg-6">
            <label for="">Nature of Work</label>
        <select name="nature_of_work" id="" class="form-select">
            <option value="Employed Individual">Employed Individual</option>
            <option value="Contract Worker">Contract Workers</option>
            <option value="Self-Employed">Self-Employed</option>
        </select>
            </div>
            <div class="col-lg-6">
            <label for="">Name of Employer / Business</label>
        <input type="text" class="form-control" name="name_of_employer_business">
            </div>
            <div class="col-lg-6">
            <label for="">Work Address</label>
        <input type="text" class="form-control" name="work_address">
            </div>
            <div class="col-lg-6">
            <label for="">Telephone</label>
        <input type="text" class="form-control" name="telephone" id="">
            </div>
            <div class="col-lg-6">
            <label for="">Position in Company</label>
        <input type="text" class="form-control" name="position_in_company">
            </div>
            <div class="col-lg-6">
            <label for="">Salary Per Month</label>
        <input type="text" class="form-control" name="salary_per_month">
            </div>
            <div class="col-lg-6">
            <label for="">Other Regular Allowance</label>
        <input type="text" class="form-control" name="other_regular_allowance">
            </div>
            <div class="col-lg-6">
            <label for="">Email</label>
        <input type="email" class="form-control" name="email" id="">
            </div>
            <div class="col-lg-6">
            <label for="">Password</label>
        <input type="password" class="form-control" name="password">
            </div>
            <div class="col-lg-12 mt-4 text-center">
            <input type="submit" class="btn btn-md btn-primary" name="register" value="Sign Up">
                <a href="Login.php">Log In</a>

            </div>
        </div>

     
        </form>
    </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['register'])){

    
    //date time
    date_default_timezone_set("Asia/Manila");
    $time= date("h:i:s", time());
    $date = date('y-m-d');

    //user id
    $user_id = "2022".rand('55555','999999');
 
    //user info
    $first_name = ucwords($_POST['first_name']);
    $middle_name = ucwords($_POST['middle_name']);
    $last_name = ucwords($_POST['last_name']);
    $residence_address = $_POST['residence_address'];
    $permanent_address = $_POST['permanent_address'];
    $provincial_address = $_POST['provincial_address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $civil_address = $_POST['civil_status'];
    $citizenship = $_POST['citizenship'];
    $name_of_spouse = ucwords($_POST['name_of_spouse']);
    $name_of_father = ucwords($_POST['name_of_father']);
    $name_of_mother = ucwords($_POST['name_of_mother']);
    $number_of_Dependents = $_POST['number_of_dependents'];
    $owned = $_POST['owned'];
    $contact_number = $_POST['contact_number'];
    $gender = $_POST['gender'];
    $nature_of_work = $_POST['nature_of_work'];
    $name_of_employer_business = $_POST['name_of_employer_business'];
    $work_address = $_POST['work_address'];
    $telephone = $_POST['telephone'];
    $position_in_company = $_POST['position_in_company'];
    $salary_per_month = $_POST['salary_per_month'];
    $other_regular_allowance = $_POST['other_regular_allowance'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //token for verification 
    $v_token = md5(rand());
    $email_status = 0;

 

    //validation
    $query_email = "SELECT * FROM users WHERE email='$email'";
    $run_email = mysqli_query($conn,$query_email);

    if(mysqli_num_rows($run_email) > 0){
        echo "<script>alert('Email already used')</script>";
    }else{
        $query_insert_registration = "INSERT INTO users (user_id,first_name,middle_name,last_name,residence_address,permanent_address,provincial_address,birthdate,age,civil_status,citizenship,name_of_spouse,name_of_father,name_of_mother,number_of_dependents,owned,contact_number,gender,nature_of_work,name_of_employer_business,work_address,telephone,position_in_company,salary_per_month,other_regular_allowance,email,password,v_token,email_status,date_time_created,date_time_updated) VALUES ('$user_id','$first_name', '$middle_name', '$last_name', '$residence_address', '$permanent_address', '$provincial_address', '$birthdate', '$age', '$civil_address', '$citizenship','$name_of_spouse','$name_of_father', '$name_of_mother', '$number_of_Dependents', '$owned', '$contact_number', '$gender', '$nature_of_work', '$name_of_employer_business', '$work_address', '$telephone', '$position_in_company', '$salary_per_month', '$other_regular_allowance', '$email' ,'$password','$v_token','$email_status', '$date $time', '$date $time')";
        $query_run_insert = mysqli_query($conn,$query_insert_registration) && sendMail($email,$v_token);
        $_SESSION['user_id'] = $user_id;
        if($query_run_insert){
            echo "Data Inserted" . "email sent?";
        }else{
            echo $conn->error;
        }
    }

}




?>
