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

        return $this->app->view('index', [
            'choice' => $choice,
            'cpuFlip' => $cpuFlip,
            'won' => $won
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

        $this->app->db()->insert('rounds', [
            'choice' => $choice,
            'won' => ($won) ? 1 : 0, # Ternary operator; checks if $won is true, therefore '1', '0' if false
            'timestamp' => date('Y-m-d H:i:s')
        ]);

        // Redirect back to home '/' and also pass in round variable data
        return $this->app->redirect('/', ['choice' => $choice, 'cpuFlip' => $cpuFlip, 'won' => $won]);
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
