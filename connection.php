<?php

$conn = new mysqli ('localhost', 'root', '', 'real_estate');

if($conn == false){
    echo "error". $conn->error;
}

?>