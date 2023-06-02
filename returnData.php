<?php

// Get the output of the temperature.php file on the pynq
$body = file_get_contents("php://input");
// encode it to json
$data = json_decode($body, true);
// and print it
print_r($data);
?>
