<?php

define("SIZE", 15);
class Board
{
    public $board;
    public function __construct(Board $board){
        $this->board = $board;
        $this->size = SIZE;

    }
    
    function validPlace()
    {
        //array(rand(0, 15), rand(0, 15))
        return array_fill(rand(0, 15), 15, [rand(0,15), rand(0,15)]);
    }
}

// define("SIZE", 15);

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
