<?php
// Function to return error messages as JSON
function sendError($reason) {
    $response = array(
        "response" => false,
        "reason" => $reason
    );

    echo json_encode($response);
}

// Example usage
if ($_POST['pid']) {
    sendError("Pid not specified");
}

$pid = $_POST['pid'];


// Checking for x and y coordinates
if ($_POST['x']) {
    sendError("x not specified");
}

if ($_POST['y']) {
    sendError("y not specified");
}

$x = $_POST['x'];
$y = $_POST['y'];
// add logic
if ($x ) {
    sendError("Invalid x coordinate, " . $x);
}

if ($y) {
    sendError("Invalid y coordinate, " . $y);
}

$response = array(
    "response" => true,
    "message" => "Success!"
);

// Output the JSON response

echo json_encode($response);

