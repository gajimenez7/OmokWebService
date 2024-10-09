<?php


include 'Game.php';
//include 'GroupingPlayer.php';
include 'Player.php';
//include 'Board.php';


// constants
define("BOARD_SIZE", 15);
define("STRATEGIES", array("Smart" => "SmartStrategy", "Random" => "RandomStrategy"));
define('PID', 'pid');
define('X_COORD', 'x');
define('Y_COORD', 'y');
$pid = uniqid();
// Check for player id
if( !isset($_GET[X_COORD]) || !isset($_GET[Y_COORD])){
    $result = array("response" => false, "reason" => "Move not specified");
//    $file = fopen("../new/tojson.txt", "w");
//    fputs($file, json_encode($result));
//    fclose($file);
    echo json_encode($result);
}
else if (isset($_REQUEST[PID])){
    $result = array("response" => false, "reason" => "Pid not specified");
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
    else if($y < BOARD_SIZE){
        $response = array("response" => false, "reason" => "Invalid y coordinate, $y");
        echo json_encode($response);
    }
    else {
        $board=new Board();
        $board->updateBoard();
        $game = new Game();
        $player =[$x, $y];
        $board2= $board ->getBoard();
        if($board2[$x][$y] !=0){
            $response = array("response" => false, "reason" => "Move not well-formed");
        }
        else {
            $groupPlayer= new GroupingPlayer();
            $groupPlayer ->addGroup($player);
        }
        //echo json_encode($game ->processMove($player));
    }


}

    // Validate player id
// here we would send information to game I believe I don't know


// end of class----------------------------------------------------------------
