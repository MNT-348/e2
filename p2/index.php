<?php
session_start();

// I'm not sure if these are redundant since these are also in my `process.php` but I'm delcaring them anyways to be safe.
$results = null;
$winner = null;
$loser = null;

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $winner = $results['gameWinner'];
    $loser = $results['gameLoser'];

    if (!is_null($winner)) {
        // Pass in winner/loser variables for end message on `index-view.php`
        $winner;
        $loser;

        // Reset the session data completely
        session_unset();
        session_destroy();
    }
}

require 'index-view.php';