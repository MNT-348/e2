<?php

namespace App\Controllers;

class AppController extends Controller
{
    // This method is triggered by the route "/"
    public function index()
    {
        // Pass in round data (via `old`)
        $choice = $this->app->old('choice');
        $cpuFlip = $this->app->old('cpuFlip');
        $won = $this->app->old('won');

        // Get current coin counts for player and computer from session or set them to 5 initially
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $playerCoins = $_SESSION['playerCoins'] ?? 5;
        $computerCoins = $_SESSION['computerCoins'] ?? 5;

        return $this->app->view('index', [
            'choice' => $choice,
            'cpuFlip' => $cpuFlip,
            'won' => $won,
            'playerCoins' => $playerCoins,
            'computerCoins' => $computerCoins
        ]);
    }

    // This handles processing of round data
    public function process()
    {
        // Validate and ensure choices are made by player
        $this->app->validate([
            'choice' => 'required'
        ]);

        // Retrieve the user's coin face selection
        $choice = $this->app->input('choice');

        // Randomize CPU coin face selection
        $cpuFlip = ['Heads', 'Tails'][rand(0, 1)];

        // Check if player wins the round
        $won = $choice == $cpuFlip;

        // Update coin counts based on the round outcome
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $playerCoins = $_SESSION['playerCoins'] ?? 5;
        $computerCoins = $_SESSION['computerCoins'] ?? 5;

        if ($won) {
            $playerCoins += 1;
            $computerCoins -= 1;
        } else {
            $playerCoins -= 1;
            $computerCoins += 1;
        }

        // Check for winner when playerCoins or computerCoins reaches 0
        $gameWinner = 'None';
        if ($playerCoins === 0 || $computerCoins === 0) {
            if ($playerCoins === 0) {
                $gameWinner = 'Computer';
            } elseif ($computerCoins === 0) {
                $gameWinner = 'Player';
            }
        }

        // Update the coin counts in the session
        $_SESSION['playerCoins'] = $playerCoins;
        $_SESSION['computerCoins'] = $computerCoins;

        $this->app->db()->insert('rounds', [
            'choice' => $choice,
            'cpuFlip' => $cpuFlip,
            'playerCoins' => $playerCoins,
            'computerCoins' => $computerCoins,
            'won' => ($won) ? 1 : 0, # Ternary operator; checks if $won is true, therefore '1', '0' if false
            'winner' => $gameWinner,
            'timestamp' => date('Y-m-d H:i:s')
        ]);

        // Redirect back to home '/' and also pass in round variable data
        return $this->app->redirect('/', [
            'playerCoins' => $playerCoins,
            'computerCoins' => $computerCoins,
            'choice' => $choice,
            'cpuFlip' => $cpuFlip,
            'won' => $won
        ]);
    }

    // This handles the session restart
    public function restart()
    {
        // Reset the session data
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        // Redirect the user back to the homepage
        return $this->app->redirect('/');
    }

    // NOTE
    public function history()
    {
        $rounds = $this->app->db()->all('rounds');

        return $this->app->view('history', ['rounds' => $rounds]);
    }

    // NOTE
    public function round()
    {
        $id = $this->app->param('id');

        $round = $this->app->db()->findById('rounds', $id);

        return $this->app->view('round', ['round' => $round]);
    }
}
