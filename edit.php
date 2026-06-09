<?php
include 'config.php';

$id = $_GET['id'];

$data = $conn->query(
"SELECT * FROM weather_records WHERE id=$id"
)->fetch_assoc();

if(isset($_POST['update'])){

    $city = $_POST['city'];
    $temp = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $condition = $_POST['condition'];

    $conn->query("
    UPDATE weather_records SET
    city='$city',
    temperature='$temp',
    humidity='$humidity',
    weather_condition='$condition'
    WHERE id=$id
    ");

    header("Location:index.php");
}
?>

<form method="POST">
    <input type="text" name="city"
    value="<?= $data['city']; ?>">

    <input type="number" step="0.1"
    name="temperature"
    value="<?= $data['temperature']; ?>">

    <input type="number"
    name="humidity"
    value="<?= $data['humidity']; ?>">

    <input type="text"
    name="condition"
    value="<?= $data['weather_condition']; ?>">

    <button name="update">Update</button>
</form>
