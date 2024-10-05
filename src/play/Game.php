<?php
class Game {
    private $gameState;

    public function __construct() {
        // Initialize the board
        $this->gameState = [
            'board' => [],
        ];
    }
    // Function to process a player's move and return the result
    public function processMove($playerMove): array
    {
        // Acknowledge the player's move
        // I got this from the professor dont ask me
        $ackMove = $this->checkMove($playerMove['x'], $playerMove['y']);

        // If player's move isn't a win or draw, generate a computer move
        if (!$ackMove['isWin'] && !$ackMove['isDraw']) {
            $computerMove = $this->generateComputerMove();
            $compMove = $this->checkMove($computerMove['x'], $computerMove['y']);
        } else {
            $compMove = null; // No computer move if the player has won or it's a draw
        }

        // Build and return the response
        return [
            'response' => true,
            'ack_move' => $ackMove,
            'move' => $compMove
        ];
    }

    // Simulate or calculate the computer's move
    private function generateComputerMove() {
        // we need actual logic hehehehe
        return [
            'x' => 2,
            'y' => 2
        ];
    }

    // Function to check if a move results in a win or draw
    private function checkMove($x, $y): array
    {
        // we need actual logic in this thing
        $isWin = false; // True if this move wins the game
        $isDraw = false; // True if this move leads to a draw

        // Simulated logic bro I want to go to sleep
        if (rand(0, 1)) {
            $isWin = true;
            $row = [6, 7, 7, 7, 8, 7, 9, 7, 10, 7];
        } else if (rand(0, 1)) {
            $isDraw = true;
            $row = [];
        }

        // Return the result of the move
        return [
            'x' => $x,
            'y' => $y,
            'isWin' => $isWin,
            'isDraw' => $isDraw,
            'row' => $isWin ? $row : []
        ];
    }
}

// this thing we would get from somewhere, where you ask ? I dont know
$playerMove = ['x' => 1, 'y' => 1];

// Instantiate the Board class and process the player's move
$board = new Board();
$response = $board->validPlace($playerMove);

// Output the response as JSON
echo json_encode($response);

// some of these things I got from the professor
// I would say that this is a very rough implementation of encoding so I dont know how it would actually work
// I sometimes questioned why I chose this career