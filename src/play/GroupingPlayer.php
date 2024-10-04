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

  private int $groupSize;
  private $grouping;

  function __construct(){
    $this->groupSize = 0;
    $this->grouping = [];
  }

  function addGroup($group){
    $this->groupSize++;

    $this->grouping[$this->groupSize]= $group;
  }

  function printGrouping(){
    $arr = $this->grouping;

    foreach($arr as $val){
      echo "Group size: " . array_key_first($arr) ."\n";
      
      echo "Coords: ";
      foreach($val as $coords){
        echo $coords . " ";
      }
      echo "\n";
    }
  }

}

//test code

$test = new GroupingPlayer;

$group1 = [rand(0,15), rand(0,15)];
$test->addGroup($group1);

echo "GROUP 1 ADDED \n";
$test->printGrouping();

$group2 = [rand(0,15), rand(0,15)];
$test->addGroup($group2);

echo "GROUP 2 ADDED \n";
$test->printGrouping();
