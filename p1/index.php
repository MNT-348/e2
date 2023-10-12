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
while ($p1Coins != 0 && $p2Coins != 0)
    {
        # Randomization fxn for P1 and P2
        $p1Face = $coin[rand(0,1)];
        $p2Face = $coin[rand(0,1)];

        # Check coin faces and decrease loser HP
        if ($p1Face == $p2Face)
        {
            $p2Coins--;
            $p1Coins++;
            $roundWinner = $player1;
            $roundLoser = $player2;
        }
        else
        {
            $p1Coins--;
            $p2Coins++;
            $roundWinner = $player2;
            $roundLoser = $player1;
        }
    
    # Initialize array to pass values to 'echo' in View
    $results[] = [
        'p1Face' => $p1Face,
        'p2Face' => $p2Face,
        'p1_HP' => $p1Coins,
        'p2_HP' => $p2Coins,
        'roundWin' => $roundWinner,
        'roundLose' => $roundLoser
    ];
    }

# Print win states after a player has no more HP/coins
if ($p1Coins == 0)
{
    $winner = $player2;
    $loser = $player1;
}
else
{
    $winner = $player1;
    $loser = $player2;
}

require 'index-view.php';