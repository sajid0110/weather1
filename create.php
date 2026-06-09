<?php
include 'config.php';

if(isset($_POST['submit'])){

    $city = $_POST['city'];
    $temp = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $condition = $_POST['condition'];

    $sql = "INSERT INTO weather_records
    (city,temperature,humidity,weather_condition)
    VALUES
    ('$city','$temp','$humidity','$condition')";

    $conn->query($sql);

    header("Location:index.php");
}
?>

<form method="POST">
    <input type="text" name="city" placeholder="City" required>
    <input type="number" step="0.1" name="temperature" placeholder="Temperature">
    <input type="number" name="humidity" placeholder="Humidity">
    <input type="text" name="condition" placeholder="Condition">
    <button name="submit">Save</button>
</form>
