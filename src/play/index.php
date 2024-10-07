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

    // Read game data
    $file = file_get_contents("new/tojson.txt");
    $read_File = json_decode($file);

    if (!$read_File->{$pid} == $_REQUEST[PID]) {
        $response = array("response" => false, "reason" => "Unknown pid");
        echo json_encode($response);
    } else if ($x <= BOARD_SIZE  ) {
        $response = array("response" => false, "reason" => "Invalid x coordinate, $x");
        echo json_encode($response);

    }
    else if($y <= BOARD_SIZE){
        $response = array("response" => false, "reason" => "Invalid y coordinate, $y");
        echo json_encode($response);
    }
    else {
        $game = new Game();
        $player =[X_COORD, Y_COORD];
        echo json_encode($game ->processMove($player));
    }


}

    // Validate player id
// here we would send information to game I believe I don't know


// end of class----------------------------------------------------------------