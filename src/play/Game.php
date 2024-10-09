<?php
include "Board.php";
class Game {


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

//        $array =['response' => true,
//            'ack_move' => $ackMove,
//            'move' => $compMove];
//        $tofile=json_encode($array);
//        file_put_contents('tojson', $tofile);

        // Build and return the response
        return [
            'response' => true,
            'ack_move' => $ackMove,
            'move' => $compMove
        ];
    }

    // Simulate or calculate the computer's move
    private function generateComputerMove(): array
    {
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

        $array = [$x, $y];

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
$game = new Game();
$response = $game->processMove($playerMove);


// Output the response as JSON
echo json_encode($response);

// some of these things I got from the professor
// I would say that this is a very rough implementation of encoding so I dont know how it would actually work
// I sometimes questioned why I chose this career