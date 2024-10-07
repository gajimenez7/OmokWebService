<?php
$url = 'https://www.cs.utep.edu/cheon/cs3360/project/omok/new/';
$strategy = 'Smart';
$response = @file_get_contents("$url?strategy=$strategy");
if ($response) {
    echo $response;
} else {
    echo "Failed to get response.";
}