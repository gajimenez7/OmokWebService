<?php

class GroupingPlayer{
  
  // two attributes
  //  - int groupSize
  //    - stores the "size of array"/ number of placement groups
  //    - has a priority the bigger the size
  //    - added as player makes placement
  //  - array groups
  //    - stores array/list of coords for player placement
  //
  // this should be implemented with a priority queue
  //  - the higher the grouping size, the higher the priority
  //
  // add type of diagonality, horizonality, verticality, etc.

  private int $groupSize;
  private $grouping;
  private  string $orientation;

  function __construct(){
    $this->groupSize = 0;
    $this->grouping = [];
    $this->orientation = "null";
  }

  function checkOrientation($group){
    // set orientation inside of grouping object
  }

  function getOrientation($group){
    return $this->orientation;
  }

  function addGroup($group){
    $this->groupSize++;
    $this->grouping[]= $group;
  }

  function getGroupSize(){
    return $this->groupSize;
  }

  function getGrouping(){
    return $this->grouping;
  }
  function printGrouping(){
    $arr = $this->grouping;

    foreach($arr as $val){
      echo "Group size: " . $this->groupSize . "\n";

      echo "Coords: ";
      foreach($val as $coords){
        echo $coords . " ";
      }
      echo "\n";
    }
  }

}

//test code
/*
$test = new GroupingPlayer;

$group1 = [rand(0,15), rand(0,15)];
$test->addGroup($group1);

echo "GROUP 1 ADDED \n";
echo "\n";

$test->printGrouping();

echo "\n";

$group2 = [rand(0,15), rand(0,15)];
$test->addGroup($group2);

echo "GROUP 2 ADDED \n";
echo "\n";

$test->printGrouping();
 */
