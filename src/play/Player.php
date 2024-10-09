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

class Player extends SplPriorityQueue
{
  public const BROW = "beg";
  public const EROW = "end";

  // parse queue/heap and check for addition of groupings
  // return a boolean if it is in grouping
  //
  // check the "ends" first, to check if it is in a current
  // grouping
  //
  // if the group is in a grouping with the middle places
  // create a new grouping with
  //
  // create a clone of the player object to use as reference and traverse
  public function inGrouping($group, $grouping, $theQueue)
  {
    $isInGrouping = false;
    $whichEnd = "null";
    

    // create new copy of the current queue
    // $myQueue = new Player();

    $myQueue = clone $theQueue;

    $myQueue->setExtractFlags(1);

    // get coordinate values from group we want
    // to insert
    $currX = $group[0];
    $currY = end($group);

//   // echo "x: " . $currX . " y: " . $currY . "\n";

    // while the queue isn't empty, get values of first node
    // parse through each x and y and compare with ours
    // both x and y flags must be true for the group we want
    // to add to be in the grouping
    //
    // if not, we will instantiate a new grouping object
    // and insert group into new grouping
    //
    // TODO: need to check if there can be a new group created

//    // print_r($thisQueue);
//
    while (!$myQueue->isEmpty()) {
      $arrOrientations = ["vertical", "horizontal", "forw_diagonal", "back_diagonal"];
      // need to check orientation if there is one associated
      $orient = $grouping->getOrientation();

      $arr = $myQueue->extract();
      // check first and last coordinates
      $firstX = $arr[0][0];
      $firstY = $arr[0][1];

      $lastX = end($arr)[0];
      $lastY = end($arr)[1];

      // compare with first coords: x
//      echo "comparing first coords: " . $firstX . ", " . $firstY . "\n";
      // first coordinate, can only check backwards

      if (($orient == $arrOrientations[0]) && ($currX == $firstX && $currY == $firstY - 1)) {
//        echo "f1 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      } elseif (($orient == $arrOrientations[1]) && ($currX == $firstX - 1 && $currY == $firstY)) {
//        echo "f2 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      } elseif (($orient == $arrOrientations[2]) && ($currX == $firstX - 1 && $currY == $firstY - 1)) {
//        echo "f3 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      } elseif (($orient == $arrOrientations[3]) && ($currX == $firstX - 1 && $currY == $firstY + 1)) {
//        echo "f4 \n";
        $isInGrouping = true;
        $whichEnd = self::BROW;
      }
      // compare with last coords: x
//      echo "comparing last coords: " . $lastX . ", " . $lastY . "\n";
      if (($orient == $arrOrientations[0]) && ($currX == $lastX && $currY == $lastY + 1)) {
        $isInGrouping = true;
//        echo "l1 \n";
        $whichEnd = self::EROW;
      } elseif (($orient == $arrOrientations[1]) && ($currX == $lastX + 1 && $currY == $lastY)) {
//        echo "l2 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      } elseif (($orient == $arrOrientations[2]) && ($currX == $lastX + 1 && $currY == $lastY + 1)) {
//        echo "l3 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      } elseif (($orient == $arrOrientations[3]) && ($currX == $lastX - 1 && $currY == $lastY - 1)) {
//        echo "l4 \n";
        $isInGrouping = true;
        $whichEnd = self::EROW;
      }

      // if it is in grouping just insert into grouping given in parameter
      //
//      echo "in grouping boolean value: " . $isInGrouping . "\n";

      if ($isInGrouping == 1) {
//        echo "enter if and added group to grouping \n";
        $grouping->addGroup($group);
      } elseif ($isInGrouping != 1) {
//        echo "in else not grouping \n";
        // else create a new grouping object and add it
        //
        // double check to make sure that new grouping is being made each time
        for ($i = 0; $i < sizeOf($arr); $i++) {
          if (($currX == $arr[$i][0]) && ($currY == $arr[$i][1] + 1)) {
            $newGrouping = new GroupingPlayer();
            $newGrouping->addGroup($group);
            $newGrouping->addGroup([$arr[$i][0], $arr[$i][1]]);
//            echo "----in second if condition \n";
            self::insert($newGrouping->getGrouping(), $newGrouping->getGroupSize());
          } else if (($currX == $arr[$i][0]) && ($currY == $arr[$i][1] - 1)) {
            $newGrouping = new GroupingPlayer();
            $newGrouping->addGroup($group);
            $newGrouping->addGroup([$arr[$i][0], $arr[$i][1]]);
//            echo "----in second if condition \n";
            self::insert($newGrouping->getGrouping(), $newGrouping->getGroupSize());
          } elseif (($currX == $arr[$i][0] - 1) && ($currY == $arr[$i][1])) {
            $newGrouping = new GroupingPlayer();
            $newGrouping->addGroup($group);
            $newGrouping->addGroup([$arr[$i][0], $arr[$i][1]]);
//            echo "----in second else if condition \n";
            self::insert($newGrouping->getGrouping(), $newGrouping->getGroupSize());
          } else if (($currX == $arr[$i][0] + 1) && ($currY == $arr[$i][1])) {
            $newGrouping = new GroupingPlayer();
            $newGrouping->addGroup($group);
            $newGrouping->addGroup([$arr[$i][0], $arr[$i][1]]);
//            echo "----in second if condition \n";
            self::insert($newGrouping->getGrouping(), $newGrouping->getGroupSize());
          }
//          echo "created new group \n";
        }
      }
      return [$isInGrouping];
    }
  }

  // create a method which receives groupingplayer/ parses,
  // and returns coordinates
  public function getCoordX($group)
  {
    $xCoord = 0;
    foreach ($group as $val) {
      $xCoord = $val[0];
    }
    return $xCoord;
  }

  public function getCoordY($group)
  {
    $yCoord = 0;
    foreach ($group as $val) {
      $yCoord = end($val);
    }
    return $yCoord;
  }

  public function printGroupings($groups)
  {
    foreach ($groups as $val) {
//      echo "Coords: ";
      foreach ($val as $coords) {
//        echo $coords . " ";
      }
//      echo "\n";
    }
  }
}

#################################################################
# TEST CODE

//$group1 = [1, 1];
//$group2 = [2, 2];
//$group3 = [3, 3];
//
//$group4 = [1, 2];
//
//$grouping1 = new GroupingPlayer();
//$player1 = new Player();
//
//$grouping1->addGroup($group1);
//$grouping1->addGroup($group2);
//$player1->insert($grouping1->getGrouping(), $grouping1->getGroupSize());
//
//$inVariable1 = $player1->inGrouping($group3, $grouping1, $player1);
//
//if ($inVariable1) {
////  echo "in grouping 1 \n";
//} else {
////  echo "not in grouping 1 \n";
//}
//
////print_r($player1);
////
//$inVariable2 = $player1->inGrouping($group4, $grouping1, $player1);
//
//if ($inVariable2) {
////  echo "group 4 in grouping 1 \n";
//} else {
////  echo "group 4 not in grouping 1 \n";
//}

//print_r($player1);
//
/*
// one grouping
// one group

////echo "---Grouping 1--- \n";

$group1 = [1, 1];

$testGrouping = new GroupingPlayer;

$testGrouping->addGroup($group1);

$testPlayer = new Player;

$testPlayer->insert($testGrouping->getGrouping(), $testGrouping->getGroupSize());

//$whatIsInHere =  $testPlayer->extract();

// only printing one group, we need to return all groups, which is inside here
//////echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";

//////echo "\n";

// get group priority which is groupsize
//////echo "Group Size/Priority: " . $testGrouping->getGroupSize() . "\n";

// two groups

$group2 = [rand(0,15), rand(0,15)];

$testGrouping->addGroup($group2);

$testPlayer->insert($testGrouping->getGrouping(), $testGrouping->getGroupSize());

//$whatIsInHere =  $testPlayer->extract();

// only printing one group, we need to return all groups, which is inside here
////echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";
////echo "\n";

// get group priority which is groupsize
//// echo "Group Size/Priority: " . $testGrouping->getGroupSize() . "\n";

// grouping two
//// echo "---Grouping 2--- \n";

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
//echo "Group 1: ";
//print_r($group1);
////echo "\n";

//echo "Group 2: ";
//print_r($group2);
////echo "\n";

//echo "Group 3: ";
//print_r($group3);
////echo "\n";

$testPlayer->setExtractFlags(3);
$topNode = $testPlayer->top();

//print_r($topNode);
////echo "\n";

$valuesTop = $topNode[0];

$priorityTop = end($topNode);

////print_r($valuesTop);
//////echo "\n";

////print_r($priorityTop);
//////echo "\n";

////echo "Value: " . $topNode[0] . " and Priority: " . end($topNode) . "\n";

$testPlayer->setExtractFlags(1);

while(!$testPlayer->isEmpty()){
  $whatIsInHere = $testPlayer->extract();

  // get group priority which is groupsize
//  // echo "Group Size/Priority: " . $testGrouping2->getGroupSize() . "\n";

//  // echo "Coords: (" . $testPlayer->getCoordX($whatIsInHere) . ", " . $testPlayer->getCoordY($whatIsInHere) . ")";
//  // echo "\n";
}

$group4 = [2, 2];
$testPlayer->inGrouping($group4, $testPlayer);
 */
