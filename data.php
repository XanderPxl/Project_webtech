<?php
$body = file_get_contents("php://input");
$data = json_decode($body, true);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON decoding error: " . json_last_error_msg();
} else {
    echo "Decoded data: " . print_r($data, true);
}

?>