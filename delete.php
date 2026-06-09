<?php
include 'config.php';

$id = $_GET['id'];

$conn->query(
"DELETE FROM weather_records WHERE id=$id"
);

header("Location:index.php");
?>
