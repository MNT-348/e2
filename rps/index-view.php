<?php
session_start();

use RPS\Game;
use App\Debug;

require 'index.php'

// Create or retrieve the Game object from the session
if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new Game();
}
$game = $_SESSION['game'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the player's choice from the form
    $playerChoice = $_POST['choice'];

    // Play the game with the player's choice
    $result = $game->play($playerChoice);

    // Store the updated game object in the session
    $_SESSION['game'] = $game;
}

// Get the last x results
$maxResults = 10; // Change this value to the desired number of results
$results = $game->getResults($maxResults);

// Clear results if requested
if (isset($_GET['clear'])) {
    $game->clearResults();
    $results = []; // Clear the results array
    $_SESSION['game'] = $game; // Store the updated game object in the session
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rock Paper Scissors Game</title>
</head>

<body>
    <h1>Rock Paper Scissors Game</h1>

    <?php if (isset($result)) : ?>
    <p><?php echo $result['outcome']; ?></p>
    <p>Player: <?php echo $result['player']; ?></p>
    <p>Computer: <?php echo $result['computer']; ?></p>
    <p>Timestamp: <?php echo $result['timestamp']; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <p>
            <input type="radio" name="choice" value="rock" checked> Rock
            <input type="radio" name="choice" value="paper"> Paper
            <input type="radio" name="choice" value="scissors"> Scissors
        </p>
        <input type="submit" value="Submit">
    </form>

    <h2>Last Results</h2>
    <?php if ($results !== null) : ?>
    <?php if (count($results) > 0) : ?>
    <ul>
        <?php foreach ($results as $round) : ?>
        <li><?php echo $round['outcome']; ?> (Player: <?php echo $round['player']; ?>, Computer:
            <?php echo $round['computer']; ?>, Timestamp: <?php echo $round['timestamp']; ?>)</li>
        <?php endforeach; ?>
    </ul>
    <?php else : ?>
    <p>No results available.</p>
    <?php endif; ?>
    <?php endif; ?>

    <p><a href="?clear=1">Clear Results</a></p>
</body>

</html>