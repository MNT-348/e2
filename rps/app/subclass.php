<?php

namespace RPS;

class MyGame extends Game
{
    protected $moves = ['heads', 'tails'];

    // Compares $playerMove against $computerMove and determines whether player won or lost
    protected function determineOutcome($playerMove, $computerMove)
    {
        if ($playerMove == $computerMove) {
            return 'lost';
        } elseif ($playerMove == 'heads' && $computerMove == 'tails') {
            return 'won';
        } elseif ($playerMove == 'tails' && $computerMove == 'heads') {
            return 'won';
        } else {
            die('Invalid move: ' . $playerMove);
        }
    }
}