<?php

include "Board.php";
include "MoveStrategy.php";

$compStart = True;

class SmartStrategy extends MoveStrategy{

  function computerStart(){
    global $compStart;


    if($compStart){
      $compStart = False;

      $selectX = 7;
      $selectY = 7;
    }
  }

  function pickPlace() {
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
    if($this->threeRow()){
      // from Player class, check 
      // cover open side
    }
    else{
      // from stored computer placements
      //  - select random coordinate and place near to create
      //  a computer win
    }
  }

  // check if there are 3 in a row
  function threeRow(){
    return true;
  }

}

$board = new Board();
$s = new SmartStrategy($board);

$s->pickPlace();
