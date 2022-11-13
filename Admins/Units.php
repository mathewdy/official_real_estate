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
    <link rel="stylesheet" href="../src/styles/boostrap/bootstrap.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#" style="font-size:2em;">El Pueblo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Units.php">Units</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Appointments.php">Appointments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Payments.php">Payments</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
            <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="Logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-5">
<span class="d-flex justify-content-between">
<h1>Units</h1>
<span>
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Unit</a>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <!----modal to dapat---->
            <!-- ayan modal na -->
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="">Model</label>
                    <input type="text" class="form-control" name="model">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Type</label>
                    <input type="text" class="form-control" name="type">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Floor Area</label>
                    <input type="text" class="form-control" name="floor_area">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Number of Available Units</label>
                    <input type="number" class="form-control" name="available">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Total Price Contract</label>
                    <input type="number" class="form-control" name="total_price_contract">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Reservation Fee</label>
                    <input type="number" class="form-control" name="reservation_fee">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Net Equity</label>
                    <input type="number" class="form-control" name="net_equity">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Option Equity</label>
                    <input type="number" class="form-control" name="option_equity">
                </div>
                <div class="col-lg-12 mb-3">
                    <label for="">Bank Financing</label>
                    <input type="number" class="form-control" name="bank_financing">
                </div>
                
                <div class="col-lg-12 mb-3">
                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image" id="" >
                </div>    
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="add_unit" class="btn btn-primary" value="Add Unit">
        </div>
    </form>
    </div>
  </div>
</div>
</span>
</span>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Unit Model</th>
                    <th>Type</th>
                    <th>Floor Area</th>
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
                                    <td><?php echo $row ['floor_area']?></td>
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
    </div>
</div>    
<script src="../src/styles/boostrap/popper.js"></script>
<script src="../src/styles/boostrap/bootstrap.js"></script>
</body>
</html>

<?php
ob_end_flush();
if(isset($_POST['add_unit'])){

  date_default_timezone_set("Asia/Manila");
  $time= date("h:i:s", time());
  $date = date('y-m-d');

  $unit_id = "2022".rand('1','10') . substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3) ;

  $model = $_POST['model'];
  $type = $_POST['type'];
  $floor_area = $_POST['floor_area'];
  $available = $_POST['available'];
  $total_price_contract = $_POST['total_price_contract'];
  $reservation_fee = $_POST['reservation_fee'];
  $net_equity = $_POST['net_equity'];
  $option_equity = $_POST['option_equity'];
  $bank_financing = $_POST['bank_financing'];
  //image
  $image = $_FILES['image']['name'];

  $query_condo = "SELECT * FROM units WHERE model='$model' AND type='$type'";
  $run_condo = mysqli_query($conn,$query_condo);
  
  if(mysqli_num_rows($run_condo) > 0){
      echo "<script>alert('Unit Already Added')</script>";
      exit();
  }


  //allowed files
  $allowed_extension = array('gif','png','jpg','jpeg', 'PNG', 'GIF', 'JPG', 'JPEG');
  $filename = $_FILES['image']['name'];
  $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
  if(!in_array($file_extension,$allowed_extension)){
      echo "<script>alert('File not allowed'); </script>";
  }else{
      
      if(file_exists("uploads/" .$_FILES['image']['name'])){
          $filename = $_FILES['image']['name'];
      }else{
          $query_insert_unit = "INSERT INTO units (unit_id,model,type,floor_area,available,total_price_contract,reservation_fee,net_equity,option_equity,bank_financing,image,date_time_created,date_time_updated) VALUES ('$unit_id', '$model','$type','$floor_area','$available', '$total_price_contract','$reservation_fee', '$net_equity', '$option_equity', '$bank_financing', '$image','$date $time', '$date $time')";
          $sql_insert_unit = mysqli_query($conn,$query_insert_unit);
      
          if($sql_insert_unit){
              move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/".$_FILES["image"]["name"]);
              echo "<script>alert('added unit') </script>";
              echo "<script>window.location.href='Units.php'</script>";
          }else{
              echo "error" .$conn->error;
          }
      }
  }

}
?>