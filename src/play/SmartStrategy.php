<?php

include "Player.php";
include "GroupingPlayer.php";

$compStart = true;

class SmartStrategy extends MoveStrategy
{
  public function computerStart()
  {
    global $compStart;

    if ($compStart) {
        $compStart = false;

        $selectX = 7;
        $selectY = 7;
    }
  }

  public function pickPlace()
  {
    // place must be picked based off of two criteria:
    // - there is a valid place
    // - the player has 3 stones in a row (-,|,\,/) (PRIORITY)

    // comp starts (7,7) -> middle of board
    $this->computerStart();
    // check potential player win
    // if there is a potential player win:
    //  - cover one side of 3 row
    // else, we add stone to:
    //  - rather new open area
    //  - or new open area next to an existing stone
  }
  // aqui we
  // place holder
  //
  // insert computer placement into board
  public function insert($x, $y, $orientation): int
  {
    // get coordinates from computer to place into board
    // "traverse" too cordinates on board and set
    return 0;
  }

  // check if placement is valid
  public function isEmpty($x, $y): bool
  {
    return true;
  }
}

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
