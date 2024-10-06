<?php

include "MoveStrategy.php";
include "Board.php";
include "GroupingPlayer.php";


// we add group to GroupingPlayer class (coordinates)
// insert the group into the priority queue where:
//  - the priority is the group size
//  - the value is the grouping
class Player extends SplPriorityQueue{
  // create a method which recieves groupingplayer/ parses,
  // and returns coordinates
  
  function printGroupings($groups){
    foreach($groups as $val){
      echo "Coords: ";
      foreach($val as $coords){
        echo $coords . " ";
      }
      echo "\n";
    }

  }
}

$group1 = [rand(0,15), rand(0,15)];

$testGrouping = new GroupingPlayer;

$testGrouping->addGroup($group1);

$testPlayer = new Player;

$testPlayer->insert($testGrouping->getGrouping(), $testGrouping->getGroupSize());

$testPlayer->printGroupings($testPlayer->extract());
