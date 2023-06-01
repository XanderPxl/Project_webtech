<?php

// Generate a random number
$random_number = rand();

// Create an associative array for JSON response
$response = array(
    'value' => $random_number
);

// Set the response header to JSON
header('Content-Type: application/json');

// Encode the array into JSON format
$jsonResponse = json_encode($response);

// Return the JSON respe
echo $jsonResponse;
