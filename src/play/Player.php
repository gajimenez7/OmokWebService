<?php

include "MoveStrategy.php";
include "Board.php";
include "GroupingPlayer.php";


// we add group to GroupingPlayer class (coordinates)
// insert the group into the priority queue where:
//  - the priority is the group size
//  - the value is the grouping
//
// groups are inside GroupingPlayer object, which holds all groups

class Player extends SplPriorityQueue{
  // create a method which receives groupingplayer/ parses,
  // and returns coordinates
  function getCoordX($group){
    $xCoord = 0;
    foreach($group as $val){
      $xCoord = $val[0];
    }
    return $xCoord;
  }

  function getCoordY($group){
    $yCoord = 0;
    foreach($group as $val){
      $yCoord = end($val);
    }
    return $yCoord;
  }

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

#################################################################
# TEST CODE

// one grouping
// one group

//echo "---Grouping 1--- \n";

$group1 = [rand(0,15), rand(0,15)];

$testGrouping = new GroupingPlayer;

$testGrouping->addGroup($group1);

$testPlayer = new Player;

$testPlayer->insert($testGrouping->getGrouping(), $testGrouping->getGroupSize());

//$whatIsInHere =  $testPlayer->extract();

// only printing one group, we need to return all groups, which is inside here
////echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";

////echo "\n";

// get group priority which is groupsize
////echo "Group Size/Priority: " . $testGrouping->getGroupSize() . "\n";

// two groups

$group2 = [rand(0,15), rand(0,15)];

$testGrouping->addGroup($group2);

$testPlayer->insert($testGrouping->getGrouping(), $testGrouping->getGroupSize());

//$whatIsInHere =  $testPlayer->extract();

// only printing one group, we need to return all groups, which is inside here
//echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";
//echo "\n";

// get group priority which is groupsize
// echo "Group Size/Priority: " . $testGrouping->getGroupSize() . "\n";

// grouping two
// echo "---Grouping 2--- \n";

$group3 = [rand(0,15), rand(0,15)];

$testGrouping2 = new GroupingPlayer;

$testGrouping2->addGroup($group3);

$testPlayer->insert($testGrouping2->getGrouping(), $testGrouping2->getGroupSize());

// checking out the queue and its values
//
// !!!!!!!!!!!!!!!!!!!!!!!
// this contains 2 coords for some reason??? idk why
// !!!!!!!!!!!!!!!!!!!!!!!
//
//
//

echo "Group 1: ";
print_r($group1);
echo "\n";

echo "Group 2: ";
print_r($group2);
echo "\n";

echo "Group 3: ";
print_r($group3);
echo "\n";

$testPlayer->setExtractFlags(3);
$topNode = $testPlayer->top();

print_r($topNode);
echo "\n";

$valuesTop = $topNode[0];

$priorityTop = end($topNode);

//print_r($valuesTop);
//echo "\n";

//print_r($priorityTop);
//echo "\n";

//echo "Value: " . $topNode[0] . " and Priority: " . end($topNode) . "\n";

$testPlayer->setExtractFlags(1);

while(!$testPlayer->isEmpty()){
  $whatIsInHere = $testPlayer->extract();

  // get group priority which is groupsize
  // echo "Group Size/Priority: " . $testGrouping2->getGroupSize() . "\n";

  // echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";
  // echo "\n";
}
