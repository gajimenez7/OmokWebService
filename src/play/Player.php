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

  // parse queue/heap and check for addition of groupings
  // return a boolean if it is in grouping
  //
  // check the "ends" first, to check if it is in a current
  // grouping
  //
  // if the group is in a grouping with the middle places
  // create a new grouping with 
  function inGrouping($group, $thisQueue){
    $isInGrouping = false;
    $isInGroupingY = false;
    
    // create new copy of the current queue
    $myQueue = new \SplPriorityQueue();

    $myQueue = $thisQueue;

    $myQueue->setExtractFlags(1);
    
    // get coordinate values from group we want
    // to insert
    $currX = $group[0];
    $currY = end($group);
    
    echo "x: " . $currX. " y: " . $currY . "\n";

    // while the queue isn't empty, get values of first node
    // parse through each x and y and compare with ours
    // both x and y flags must be true for the group we want
    // to add to be in the grouping
    //
    // if not, we will instantiate a new grouping object
    // and insert group into new grouping
    //
    // TODO: need to check if there can be a new group created
    while(!$myQueue->isEmpty()){
      $arr = $myQueue->extract();

      foreach($arr as $val){
        // check x coordinates
        switch($currX){
          case $val[0]+1:
            $isInGrouping = true;
            echo "case 1 x: " . $val[0]+1 . "\n";
            break;
          case $val[0]-1:
            $isInGrouping = true;
            echo "case 2 x: " . $val[0]-1 ." \n";
            break;
          }

        // check y coordinates
        switch ($currY) {
          case end($val)+1:
            $isInGrouping = true;
            echo "case 1 y: " . end($val)+1 . "\n";
            break;
          case end($val)-1:
            $isInGrouping = true;
            echo "case 2 y: " . end($val)-1 . " \n";
            break;
        }
      }
    }
  }
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

$group1 = [1, 1];

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
/*
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
 */

$group4 = [2, 2];
$testPlayer->inGrouping($group4, $testPlayer);


