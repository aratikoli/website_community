<?php
header('Content-Type: application/json');

// API URL and authorization header
$api_url = 'https://devsow.wpengine.com/wp-json/communities/all/';
$authorization = 'Authorization: Basic bmVoYTowI21JdkJCdzRBdWJoKTU5QXhEQ0hIQTU=';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization));

// Execute cURL request
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)]);
    exit;
}

// Close cURL session
curl_close($ch);

// Decode the JSON response
$communities = json_decode($response, true);

// Check if decoding was successful
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => json_last_error_msg()]);
    exit;
}

// Output the data
echo json_encode($communities);
?>
