<?php

class GroupingPlayer{
  
  private int $counter;
  private array $threeGroup;

  function __construct(){
    $this->counter = 0;
    $this->threeGroup = [];
  }

  function addGroup($group){
    self::$threeGroup[] = $group;
  }
}
