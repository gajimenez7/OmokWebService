<?php

include "Player.php";
include "GroupingPlayer.php";

$compStart = true;

class SmartStrategy extends MoveStrategy
{
    public function computerStart()
    {
        $defaultX = 0;
        $defaultY = 0;
        global $compStart;

        if ($compStart) {
            $compStart = false;

            $defaultX = 7;
            $defaultY = 7;
        }
        return [$selectX, selectY];
    }

    public function pickPlace($arr)
    {
        // pick place will receive an array of coordinates/ the top
        // grouping extracted from GroupingPlayer
        //
        // we can check the first coordinates from the grouping
        // if the are greater than 0 and less than 15, select
        // the coordinates before and then check if they are valid
        //
        // if the condition isnt met, check the last coordinates
        // from the grouping
        //
        // if they are less than 15, place after
        //
        // if no condition is met, then return an empty
        // array, which is false, then extract next
        //
        // if the priorty is 5, then player win
        //
        // place must be picked based off of two criteria:
        // - there is a valid place
        // - the player has 3 stones in a row (-,|,\,/) (PRIORITY)

        // comp starts (7,7) -> middle of board
        $pickX = $this->computerStart()[0];
        $pickY = $this->computerStart()[1];
        // check potential player win
        // if there is a potential player win:
        //  - cover one side of 3 row
        // else, we add stone to:
        //  - rather new open area
        //  - or new open area next to an existing stone

        $firstPlayerCoords = [$arr[0][0], $arr[0][1]];
        $lastPlayerCoords = [end($arr)[0], end($arr)[1]];

        if ($firstPlayerCoords[0] > 0);
    }

    public function checkWin($priorty)
    {

    }
    // aqui we
    // place holder
    //
    // insert computer placement into board
    public function insert($x, $y, $orientation): int
    {
        // get coordinates from computer to place into board
        // "traverse" too cordinates on board and set
        $x = $this->pickPlace()[0];
        $y = $this->pickPlace()[1];
        return [x, y];
    }

    // check if placement is valid
    public function isEmpty($x, $y): bool
    {
        return true;
    }
}

#############################################
## TEST CODE

$board = new Board();
$s = new SmartStrategy($board);

$testPlayer = new Player();
// make groups like this to test
// insert 3 groups
$coordinates1 = [rand(0, 15), rand(0, 15)];
$coordinates2 = [rand(0, 15), rand(0, 15)];
$coordinates3 = [rand(0, 15), rand(0, 15)];


$testPlayer->insert($coordinates1, 1);
$testPlayer->insert($coordinates2, 2);
print_r($testPlayer->extract());

$s->pickPlace();
