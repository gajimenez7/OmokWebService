<?php

include "Board.php";
include "MoveStrategy.php";

class RandomStrategy extends MoveStrategy
{
    function pickPlace()
    {
        $tempBoard = new Board();
        $placeArray = $tempBoard->validPlace();
        $key = array_rand($placeArray,1);
        $coordinate  = $placeArray[$key];
        $xKey  = array_key_first( $coordinate);
        $validX = $coordinate[$xKey];
        $yKey = array_key_last( $coordinate);
        $validY = $coordinate[$yKey];
        echo "Picking place: (" .  $validX . ", " . $validY . ")";
    }

}

$board = new Board();
$a = new RandomStrategy($board);
$a->pickPlace();
