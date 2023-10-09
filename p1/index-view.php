<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Matching Pennies (Coin Game) Simulator</title>
    <meta charset='utf-8'>
    <link href=data:; rel=icon>
</head>

<body>
    <h1>Matching Pennies (Coin Game) Simulator</h1>

    <h2>Game Mechanics</h2>
    <ul>
        <li>There are two players; Player 1 is Evens, and Player 2 is Odds.</li>
        <li>Both players start with 5 coins.</li>
        <li>Each round, Player 1 and Player 2 will take one of their coins and secretly select a coin face (heads or
            tails).</li>
        <li>The players then reveal their coins. If both are the same face (Heads/Heads or Tails/Tails), Evens wins and
            takes a coin from Odds.</li>
        <li>If the coins are different faces (Heads/Tails), Odds wins and takes a coin from Evens.</li>
        <li>The first player to win all five of their opponent's coins and have 10 in total wins.</li>
    </ul>

    <h2>Results</h2>
    <li><i>The <?php echo $loser ?> player loses with no more coins!</i></li>
    <li><b><?php echo $winner ?> wins!</b></li>

    <h2>Rounds</h2>
    <li>Both players will start with 5 coins.</li>
    <li>Player 1 is playing <b>Evens</b></li>
    <li>Player 2 is playing <b>Odds</b></li>

    <?php foreach($results as $key => $result) { ?>
    <ul>
        <li>Round: <?php echo $key + 1 ?></li>
        <li>Player 1 reveals <?php echo $result['p1Face']?></li>
        <li>Player 2 reveals <?php echo $result['p2Face']?></li>
        <li>The round goes to <b><?php echo $result['roundWin']?></b>! <?php echo $result['roundLose']?> loses a
            coin.
        </li>
        <li><b>Player 1</b> has <b><?php echo $result['p1_HP']?></b> coins remaining. <b>Player 2</b> has
            <b><?php echo $result['p2_HP']?></b> coins
            remaining.
        </li>
    </ul>
    <?php } ?>

</body>