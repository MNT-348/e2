<?php

// Initialization variables
# Player states
$player1 = "Evens";
$player2 = "Odds";
# Player HP pools (i.e. 5 pennies)
$p1Coins = 5;
$p2Coins = 5;
# Coin face states
$coin = ['Heads','Tails'];
# Refinement note: will remove magic number '5' later; possibly add "set starting HP" fxn

# WHILE either player has HP remaining
while ($p1Coins && $p2Coins) 
    {
        $p1Face = $coin[rand(0, 1)];
        $p2Face = $coin[rand(0, 1)];
    
        if ($p1Face == $p2Face) 
        {
            $roundWinner = $player1;
            $roundLoser = $player2;
        } 
        else 
        {
            $roundWinner = $player2;
            $roundLoser = $player1;
        }
    
    $p1Coins += ($p1Face == $p2Face);
    $p2Coins -= ($p1Face == $p2Face);
    $p1Coins -= ($p1Face != $p2Face);
    $p2Coins += ($p1Face != $p2Face);
    
    # Initialize array to pass values to 'echo' in View
    $results[] = 
    [
        'p1Face' => $p1Face,
        'p2Face' => $p2Face,
        'p1_HP' => $p1Coins,
        'p2_HP' => $p2Coins,
        'roundWin' => $roundWinner,
        'roundLose' => $roundLoser
    ];
    }


# Print win states after a player has no more HP/coins
$winner = ($p1Coins == 0) ? $player2 : $player1;
$loser = ($p1Coins == 0) ? $player1 : $player2;

require 'index-view.php';