<?php

include 'Game.php';

// constants
define("BOARD_SIZE", 15);
define("STRATEGIES", array("Smart" => "SmartStrategy", "Random" => "RandomStrategy"));
define('PID', 'pid');
define('X_COORD', 'x');
define('Y_COORD', 'y');
$pid = uniqid();

// Check for player id
if(!$_GET[PID] || ($_GET[X_COORD]) || ($_GET[Y_COORD])){
    $result = array("response" => false, "reason" => "Incomplete parameters");
    echo json_encode($result);
}
else {
    $pid = $_GET[PID];   // player id
    $x = $_GET[X_COORD]; //x cordinate
    $y = $_GET[Y_COORD]; //y cordinate
    $to_enconde = [];

    // Read game data
    $file = file_get_contents("here goes file where we are getting things, dont know exactly");
    $read_File = json_encode();
}

    // Validate player id
// here we would send information to game I believe I don't know


// end of class----------------------------------------------------------------