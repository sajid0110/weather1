<?php
include 'config.php';

if(isset($_POST['search'])){

    $city = $_POST['city'];

    $result = $conn->query(
    "SELECT * FROM weather_records
     WHERE city LIKE '%$city%'"
    );
}
?>

<form method="POST">
    <input type="text" name="city">
    <button name="search">Search</button>
</form>

<?php
if(isset($result)){
while($row = $result->fetch_assoc()){
    echo $row['city']." - ".
         $row['temperature']."°C<br>";
}
}
?>
