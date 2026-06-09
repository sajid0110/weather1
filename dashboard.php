<?php
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
?>

<h1>Welcome <?= $_SESSION['user']; ?></h1>

<a href="index.php">Weather Records</a>
