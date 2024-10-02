<?php

class Board
{
  // define size of the board as constant
  const SIZE = 15;

  private array $board;

  public function __construct(){
    // new blank board filled with zero, for valid placing anywhere
    $this->board = array_fill(0, self::SIZE, array_fill(0,self::SIZE,0));
  }

  function validPlace(){
    //array(rand(0, 15), rand(0, 15))
    // array_fill(rand(0, 15), 15, [rand(0,15), rand(0,15)]);
    $validArr = $this->validateBoard($this->board);
    print_r($validArr);
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
}


// $playBoard = array_fill(0, SIZE, array_fill(0, SIZE, 0));

// function printBoard($arr)
// {
//     foreach ($arr as $key) {
//         foreach ($key as $key2) {
//             echo $key2 . " ";
//         }
//         echo "\n";
//     }
// }

// function validateBoard()
// {
//     global $playBoard;

//     foreach ($playBoard as $key) {
//         foreach ($key as $key2) {
//             if ($key2 == 0) {
//                 $validBoard[(int)$key] = $key2;
//             }
//         }
//     }

//     print_r($validBoard);

//     return $validBoard;
// }

// //printBoard($playBoard);

// function getValidBoard()
// {
//     $aBoard = validateBoard();
//     return $aBoard;
// }
