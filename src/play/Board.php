<?php

class Board
{
  // empty spot = 0
  // player spot = 1
  // computer spot = 2
  //
  // define size of the board as constant
  const SIZE = 15;

  private array $board;

  public function __construct(){
    // new blank board filled with zero, for valid placing anywhere
    $this->board = array_fill(0, self::SIZE, array_fill(0,self::SIZE,0));
    $file = file_get_contents("../new/tojson.txt");
    $read_File = json_decode($file,true);
    $player=$read_File["player"];
    $bot=$read_File["bot"];
      foreach ($player as $move) {
          $x = $move[0];  // X coordinate
          $y = $move[1];  // Y coordinate
          $this->board[$x][$y] = 1;  // Place player marker (1)
      }

      // Place bot moves on the board (Bot is 2)
      foreach ($bot as $move) {
          $x = $move[0];  // X coordinate
          $y = $move[1];  // Y coordinate
          $this->board[$x][$y] = 2;  // Place bot marker (2)
      }
      echo "\nBoard State:\n";
      for ($i = 0; $i < self::SIZE; $i++) {
          for ($j = 0; $j < self::SIZE; $j++) {
              // Print each cell followed by a space for readability
              echo $this->board[$i][$j] . " ";
          }
          // Newline at the end of each row
          echo "\n";
      }

  }

  function updateBoard(){

  }

  function validPlace(){
    //declare valid array to return based on play board
    $validArr = $this->validateBoard($this->board);
    return $validArr;
  }

  function validateBoard($arr){
    $availableSpace = [];
    for($i = 0; $i < self::SIZE; $i++){
      for($j = 0; $j < self::SIZE; $j++){
        if($arr[$i][$j] == 0){
          $availableSpace[] = [$i,$j];
        }
      }
    }

    return $availableSpace;
  }

  function getBoard(){
    return $this->board;
  }
//  function updateBoard()
//  {
//      $file = file_get_contents("../new/tojson.txt");
//      $read_File = json_decode($file,true);
//      $player=$read_File["player"];
//      $bot=$read_File["bot"];
//      print_r($player);
//      print_r($bot);
//
//      //echo json_encode($read_File);
//  }

}
$board = new Board();
//print_r($board);
//print_r($bamtan);


