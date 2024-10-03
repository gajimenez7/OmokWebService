<?php

include "Board.php";
include "MoveStrategy.php";

class Game{
    public $board;
    public $strategy;
    function toJson(){}
    static function fromJson($json){
        $obj = json_decode($json); // of stdClass
        $strategy = $obj->{'strategy'};
        $board = $obj->{'board'};
        $game = new Game();
        $game->board = Board::fromJson($board);
        $name = $strategy->{'name'};
        $game->strategy = $name::fromJson($strategy);
        $game->strategy->board = $game->board;
        return $game;

    }


}
