<?php
session_start();

// Reset the session data and game
if (isset($_POST['action']) && $_POST['action'] == 'restart') {
    // Reset the session data completely
    session_unset();
    session_destroy();

    // Redirect the user back to index-view.php
    header("Location: index-view.php");
    exit();
}

// Retrieve the user's coin face selection
$playerFace = $_POST['coin_face'];

// Randomize CPU coin face selection
$cpuFace = ['Heads', 'Tails'][rand(0, 1)];

// Retrieve the current coin counts from the session
$playerCoins = isset($_SESSION['playerCoins']) ? $_SESSION['playerCoins'] : 5;
$cpuCoins = isset($_SESSION['cpuCoins']) ? $_SESSION['cpuCoins'] : 5;

// Initialize starting state for game winner/loser
$winner = null;
$loser = null;

// Compare the coin faces to determine the round winner and loser
if ($playerFace == $cpuFace) {
    $roundWinner = 'Player'; // Player wins
    $roundLoser = 'Computer'; // CPU loses
    $cpuCoins--;
    $playerCoins++;
} else {
    $roundWinner = 'Computer'; // CPU wins
    $roundLoser = 'Player'; // Player loses
    $playerCoins--;
    $cpuCoins++;
}

// Update the coin counts in the session
$_SESSION['playerCoins'] = $playerCoins;
$_SESSION['cpuCoins'] = $cpuCoins;

// Check if there is a game winner/loser
if ($playerCoins == 0) {
    $winner = 'Computer';
    $loser = 'Player';
} elseif ($cpuCoins == 0) {
    $winner = 'Player';
    $loser = 'Computer';
}

# Initialize array to pass values to `index.php`
$_SESSION['results'] =
    [
        'playerFace' => $playerFace,
        'cpuFace' => $cpuFace,
        'playerCoins' => $playerCoins,
        'cpuCoins' => $cpuCoins,
        'roundWinner' => $roundWinner,
        'roundLoser' => $roundLoser,
        'gameWinner' => $winner,
        'gameLoser' => $loser
    ];

// Redirect back to the index.php file
header("Location: index.php");
exit;
