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
   const BROW = "beg";
   const EROW = "end";

  // parse queue/heap and check for addition of groupings
  // return a boolean if it is in grouping
  //
  // check the "ends" first, to check if it is in a current
  // grouping
  //
  // if the group is in a grouping with the middle places
  // create a new grouping with 
  function inGrouping($group, $grouping, $thisQueue){
    $isInGrouping = false;
    $whichEnd = "null";
    
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

      $arrOrientations = ["vertical", "horizontal", "forw_diagonal", "back_diagonal"];
      // need to check orientation if there is one associated
      $orient = $grouping->getOrientation();
      
      echo $orient . "\n";
      echo $arrOrientations[2] . "\n";
      $arr = $myQueue->extract();
      // check first and last coordinates
      $firstX = $arr[0][0];
      $firstY = $arr[0][1];

      $lastX = end($arr)[0];
      $lastY = end($arr)[1];

      // compare with first coords: x
      echo "comparing first coords: " . $firstX . ", " . $firstY . "\n";
      // first coordinate, can only check backwards

      if(($orient == $arrOrientations[0]) && ($currX == $firstX && $currY == $firstY-1)){
        echo "f1 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      }
      else if(($orient == $arrOrientations[1]) && ($currX == $firstX-1 && $currY == $firstY)){
        echo "f2 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      }
      else if (($orient == $arrOrientations[2]) && ($currX == $firstX-1 && $currY == $firstY-1)){
        echo "f3 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      }
      else if (($orient == $arrOrientations[3]) && ($currX == $firstX-1 && $currY == $firstY+1)){
        echo "f4 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      }
      // compare with last coords: x
      echo "comparing last coords: " . $lastX . ", " . $lastY . "\n";
      if(($orient == $arrOrientations[0]) && ($currX == $lastX && $currY == $lastY+1)){
        $isInGrouping = true;
        echo "l1 \n";
        $whichEnd = self::EROW;
      }
      else if(($orient == $arrOrientations[1]) && ($currX == $lastX+1 && $currY == $lastY)){
        echo "l2 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      }
      else if (($orient == $arrOrientations[2]) && ($currX == $lastX+1 && $currY == $lastY+1)){
        echo "l3 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      }
      else if (($orient == $arrOrientations[3]) && ($currX == $lastX-1 && $currY == $lastY-1)){
        echo "l4 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      }
      
      /*
      // possibly change this to fori,
      // since this might be used to check middle values
      //
      // maybe also make a check if size is 3 or more
      foreach($arr as $val){
        // check x coordinates
        switch($currX){
          case $val[0]+1:
            $isInGroupingX = true;
            echo "case 1 x: " . $val[0]+1 . "\n";
            break;
          case $val[0]-1:
            $isInGroupingX = true;
            echo "case 2 x: " . $val[0]-1 ." \n";
            break;
        }

        // check y coordinates
        switch ($currY) {
          case end($val)+1:
            $isInGroupingY = true;
            echo "case 1 y: " . end($val)+1 . "\n";
            break;
          case end($val)-1:
            $isInGroupingY = true;
            echo "case 2 y: " . end($val)-1 . " \n";
            break;
        }
      }
       */
    }

    return $isInGrouping;
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

$group1 = [1,1];
$group2 = [2,2];
$group3 = [3,3];

$grouping1 = new GroupingPlayer;
$player1 = new Player;

$grouping1->addGroup($group1);
$grouping1->addGroup($group2);

$player1->insert($grouping1->getGrouping(),$grouping1->getGroupSize());

if($player1->inGrouping($group3, $grouping1, $player1)){
  $grouping1->addGroup($group3);
}
else{

}

/*
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

$group4 = [2, 2];
$testPlayer->inGrouping($group4, $testPlayer);
 */
