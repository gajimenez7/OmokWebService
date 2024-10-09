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

  private const VERT = "vertical";
  private const HORIZ = "horizontal";
  private const FDIAG = "forw_diagonal";
  private const BDIAG = "back_diagonal";

  function __construct(){
    $this->groupSize = 0;
    $this->grouping = [];
    $this->orientation = "null";
  }

  function checkOrientation(){
    // set orientation inside of grouping object
    if($this->groupSize >= 2){
      $size = $this->groupSize;

      $x1 = $this->grouping[0][0];
      $y1 = $this->grouping[0][1];

      $xn = end($this->grouping)[0];
      $yn = end($this->grouping)[1];

      // echo "x 1: " . $x1 . " and y 1: " . $y1 ."\n";
      // echo "x n: " . $xn . " and y n: " . $yn ."\n";

      // calculate slope to evaluate orientation

      $rise = $yn - $y1;
      $run = $xn - $x1;

      if($run == 0){
        $this->orientation = self::VERT;
      }
      else{
        $slope = $rise/$run;

        switch($slope){
        case 0:
          $this->orientation = self::HORIZ;
          break;
        case 1:
          $this->orientation = self::FDIAG;
          break;
        case -1:
          $this->orientation = self::BDIAG;
          break;
        }
      }
      // echo "orientation is " . $this->orientation . "\n";
    }
  }

  function getOrientation(){
    return $this->orientation;
  }

  function isGrouping(){
    // check if input belongs to an existing grouping
    // or add to a new grouping
  }

  function addGroup($group){
    $this->groupSize++;
    $this->grouping[]= $group;
    $this->checkOrientation();
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
     // echo "Group size: " . $this->groupSize . "\n";

     // echo "Coords: ";
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

$group1 = [1, 1];
$group2 = [2, 2]; 
$group3 = [3, 3];

$test = new GroupingPlayer;

$test->addGroup($group1);
$test->addGroup($group2);
//$test->addGroup($group3);

print_r($test);
 */
