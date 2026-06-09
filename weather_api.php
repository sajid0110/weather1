<?php

$city = $_GET['city'];

$apiKey = "YOUR_API_KEY";

$url =
"https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

$data = json_decode(file_get_contents($url), true);

echo json_encode([
    "city"=>$data['name'],
    "temp"=>$data['main']['temp'],
    "humidity"=>$data['main']['humidity'],
    "condition"=>$data['weather'][0]['main']
]);
?>
