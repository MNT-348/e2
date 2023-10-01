<?php

# Set up cards - use 10 so that you have an even number of cards to distribute
$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($cards);

# Initialize empty arrays for playerCards and pcCards
$playerCards = [];
$compCards = [];
$gameTurn = 0;

# TODO code for distributing cards in alternating fashion
# Use 'array_splice' function!
while (!empty($cards)) 
{
    // Alternate assigning cards to player and computer
    if ($gameTurn % 2 == 0) 
    {
        array_splice($playerCards, count($playerCards), 0, array_shift($cards));
        // "From array $playerCards, at offset = 0 and thus index [0], length is 0 b/c no removal elements,
        // take top card of $cards and splice into $playerCards
    } 
    else 
    {
        array_splice($compCards, count($compCards), 0, array_shift($cards));
    }
    $gameTurn++;
}

# Verify results
var_dump($playerCards); # Should yield 5 random cards
var_dump($compCards);