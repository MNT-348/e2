<?php

// require __DIR__ . '/vendor/autoload.php';

use RPS\Game;
use App\Debug;

$game = new Game();

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer
Debug::dump($game->play('rock'));