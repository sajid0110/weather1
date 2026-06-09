<?php
include 'config.php';

$id = $_GET['id'];

$row = $conn->query(
"SELECT * FROM weather_records WHERE id=$id"
)->fetch_assoc();
?>

<h2><?= $row['city']; ?></h2>

<p>Temperature: <?= $row['temperature']; ?>°C</p>
<p>Humidity: <?= $row['humidity']; ?>%</p>
<p>Condition: <?= $row['weather_condition']; ?></p>
