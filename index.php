<?php include 'config.php'; ?>


<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Weather Dashboard</h1>

<a href="create.php">Add Weather</a>
<a href="search.php">Search</a>
<a href="comment.php">Comment</a>
<table>
<tr>
    <th>City</th>
    <th>Temperature</th>
    <th>Humidity</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM weather_records");

while($row = $result->fetch_assoc()){
?>
<tr>
    <td><?= $row['city']; ?></td>
    <td><?= $row['temperature']; ?>°C</td>
    <td><?= $row['humidity']; ?>%</td>
    <td>
        <a href="details.php?id=<?= $row['id']; ?>">View</a>
        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
        <a href="delete.php?id=<?= $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
