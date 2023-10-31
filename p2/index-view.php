<!DOCTYPE html>
<html>

<head>
    <title>Matching Pennies Game</title>
</head>

<body>
    <h1>Matching Pennies Game</h1>

    <!-- Player is set to Evens for proof-of-concept for P2 completion. -->
    <h2>You are playing as Evens! Match faces with the CPU to win the round!</h2>
    <form method='POST' action='process.php'>
        <label>What face do you choose for your coin?</label><br>

        <input type="radio" id="heads" name="coin_face" value="Heads" checked><label for="heads">Heads</label>
        <input type="radio" id="tails" name="coin_face" value="Tails"><label for="tails">Tails</label>
        <button type='submit'>Show Coins!</button>
    </form>

    <?php if (isset($results) && is_null($winner)) { ?>
    <h2>Round Results:</h2>
    <p>You chose <?php echo $results['playerFace']; ?>, and the computer chose <?php echo $results['cpuFace']; ?>.</p>
    <p><?php echo $results['roundWinner']; ?> wins and gains a coin!</p>
    <p><?php echo $results['roundLoser']; ?> loses and loses a coin!</p>
    <p>You have <?php echo $results['playerCoins']; ?> coins remaining.</p>
    <p>The computer has <?php echo $results['cpuCoins']; ?> coins remaining.</p>
    <?php } ?>

    <?php if (isset($results) && !is_null($winner)) { ?>
    <h2>Game Ends! Results:</h2>
    <p><?php echo $loser; ?> has no more coins!</p>
    <p><?php echo $winner; ?> wins the game!</p>
    <p>Now restarting the game... Click "Reset Game" or "Show Face!" to restart.</p>
    <?php } ?>

    <h3>Want to quit and reset the game?</hr>
        <form method='POST' action='process.php'>
            <input type="hidden" name="action" value="restart"><button type='submit'>Reset Game</button>
        </form>

        <h2>Game Instructions:</h2>
        <ul>
            <li>There are two players; you play as Evens, the CPU plays as Odds. Both start with 5 coins.</li>
            <li>Each round, you will take one of your coins from your coin pool and secretly select a coin face
                (heads or
                tails).</li>
            <li>The players then reveal their coins. If both are the same face (Heads/Heads or Tails/Tails), Evens
                wins and
                takes a coin from Odds.</li>
            <li>If the coins are different faces (Heads/Tails), Odds wins and takes a coin from Evens.</li>
            <li>The first player to win all of their opponent' s coins wins.</li>
        </ul>

</body>

</html>