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
    return $this->$board;
  }
}

