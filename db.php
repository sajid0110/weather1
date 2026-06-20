<?php

$conn = mysqli_connect(
    "localhost",
    "rafi",
    "sajid123",   
    "weatherdata"    
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error()); 

}

?>
