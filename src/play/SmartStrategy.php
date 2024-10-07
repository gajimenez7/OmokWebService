<?php

include "Player.php";
include "GroupingPlayer.php";

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
      $coordinates1 = [rand(0,15), rand(0,15)];
      $coordinates2 = [rand(0,15), rand(0,15)];
      $coordinates3 = [rand(0,15), rand(0,15)];
      //horizontal
      if($this->isEmpty($coordinates3[0]+1,$coordinates1[1]) ){
          $this->insert($coordinates3[0]+1,$coordinates1[1],"Horizontal");
      }
      if($this->isEmpty($coordinates1[0]-1,$coordinates1[1]) ){
          $this->insert($coordinates1[0]-1,$coordinates1[1],"Horizontal");
      }
      //vertical
      if($this->isEmpty($coordinates3[0],$coordinates3[1]+1) ){
          $this->insert($coordinates3[0],$coordinates3[1]+1,"Vertical");
      }
      if($this->isEmpty($coordinates1[0],$coordinates1[1]-1) ){
          $this->insert($coordinates1[0],$coordinates1[1]-1,"Vertical");
      }
      //diagonal right
      if($this->isEmpty($coordinates3[0]+1,$coordinates3[1]+1) ){
          $this->insert($coordinates3[0]+1,$coordinates3[1]+1,"FDiagonal");
      }
      if($this->isEmpty($coordinates1[0]-1,$coordinates1[1]-1) ){
          $this->insert($coordinates1[0]-1,$coordinates1[1]-1,"FDiagonal");
      }
      //diagonal left
      if($this->isEmpty($coordinates3[0]-1,$coordinates3[1]+1) ){
          $this->insert($coordinates3[0]-1,$coordinates3[1]+1,"BDiagonal");
      }
      if($this->isEmpty($coordinates1[0]-1,$coordinates1[1]-1) ){
          $this->insert($coordinates1[0]-1,$coordinates1[1]-1,"BDiagonal");
      }

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
    if($this->horizontal()){
      // from Player class, check 
      // cover open side
    }
    else{
      // from stored computer placements
      //  - select random coordinate and place near to create
      //  a computer win
    }
  }// aqui we
    // place holder
    function insert( $x,  $y,$orientation): int
    {
        return 0;
    }

  function isEmpty($x,$y): bool
  {
      return true;
  }

  // check if there are 3 in a row
  function horizontal( ): bool
  {

    return true;
  }


  function  vertical(): bool{
      return false;
  }
  function diagonalRight(): bool{
      return true;
  }
  function diagonalLeft(): bool{
      return true;

  }


}

$board = new Board();
$s = new SmartStrategy($board);

$testPlayer = new Player;
// make groups like this to test
// insert 3 groups
$coordinates1 = [rand(0,15), rand(0,15)];
$coordinates2 = [rand(0,15), rand(0,15)];
$coordinates3 = [rand(0,15), rand(0,15)];


$testPlayer->insert($coordinates1,1);
$testPlayer->insert($coordinates2,2);
print_r($testPlayer->extract());

$s->pickPlace();
