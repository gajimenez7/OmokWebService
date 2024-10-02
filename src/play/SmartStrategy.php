<?php

include "Board.php";
include "MoveStrategy.php";

class SmartStrategy extends MoveStrategy{

  private bool $compStart;
  
  function __construct(){
    $this->compStart = true;
  }
  function pickPlace(){
    // place must be picked based off of two criteria:
    // - there is a valid place
    // - the player has 3 stones in a row (-,|,\,/)

    // comp starts (7,7) -> middle of board
    if(self::$compStart){
      $compStart = false;
      $selectX = 7;
      $selectY = 7;
      echo "Picking Place: (" . $selectX . ", " . $selectY . ")";
    }
    else{
      // check potential player win
      // if there is a potential player win:
      //  - cover one side of 3 row
      // else, we add stone to:
      //  - rather new open area
      //  - or new open area next to an existing stone
      if($this->threeRow()){
        // cover open side
      }
      else{
        // from stored computer placements
        //  - select random coordinate and place near to create
        //  a computer win
      }
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
