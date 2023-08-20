<?php
$body = file_get_contents("php://input");
$data = json_decode($body, true);

if (!$data)
{
        die("Error decoding JSON: " . json_last_error_msg());
}

echo "JSON Payload: " .print_r($data, true) . "<br>";

$dbconn = pg_connect("host=localhost dbname=dbxander user=xander password=Xander8963");


if (!$dbconn)
{
        die("Connection failed: " . pg_last_error());
}

$temperature = $data['temperature'];

echo "Temperature: " . $temperature ."<br>";

$query = "INSERT INTO temperature_data (temperature) VALUES ($temperature)";
$result = pg_query($dbconn, $query);

if (!$result)
{
        die("Error in SQL query: " . pg_last_error());
}

pg_close($dbconn);


echo "Data inserted successfully!";
?>