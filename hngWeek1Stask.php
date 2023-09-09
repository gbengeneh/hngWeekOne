<?php

// Check if both query parameters are provided
if (isset($_GET['slack_name']) && isset($_GET['track'])) {
    // Retrieve the values of the query parameters
    $slackName = $_GET['slack_name'];
    $track = $_GET['track'];

    // Create an associative array with the response data
    $response = array(
        'slack_name' => $slackName,
        'current_day' => date("l"), // Get the current day
        'utc_time' => gmdate("Y-m-d\TH:i:s\Z"), // Get the current UTC time
        'track' => $track,
        'github_file_url' => 'https://github.com/username/repo/blob/main/file_name.ext', // Replace with your actual GitHub URL
        'github_repo_url' => 'https://github.com/username/repo', // Replace with your actual GitHub repository URL
        'status_code' => 200
    );

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Encode the response data as JSON and echo it
    echo json_encode($response);
} else {
    // If one or both parameters are missing, return an error message
    $errorResponse = array('error' => 'Both slack_name and track are required.');
    header('Content-Type: application/json');
    echo json_encode($errorResponse);
}

?>


