<div style="margin: 20px; font-family: Arial, sans-serif;">
    <h2>Weather Search Dashboard</h2>
    <form action="search.php" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="city" placeholder="Enter city name (e.g. Dhaka)..." style="padding: 8px; width: 280px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" style="padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Search</button>
    </form>
</div>
<hr>



<?php
include 'db.php'; 


ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['city']) || isset($_GET['city'])) {
    
    $city = isset($_POST['city']) ? $_POST['city'] : $_GET['city'];

   
    $query = "SELECT * FROM weather_datainfo WHERE city = '$city'";
    
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("<div style='color:red; font-weight:bold;'>SQL Syntax Error: " . mysqli_error($conn) . "</div>");
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' style='width:100%; text-align:left; border-collapse: collapse;'>";
        echo "<tr style='background-color:#f2f2f2;'><th>City</th><th>Temperature</th><th>Humidity</th><th>Condition</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['temperature'] . " °C</td>";
            echo "<td>" . $row['humidity'] . "%</td>";
            echo "<td>" . $row['condition_text'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No data found for: " . htmlspecialchars($city) . "</p>";
    }
} else {
    echo "<p>Please enter a city name to search.</p>";
}
?>
