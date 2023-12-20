@extends('templates/master')

@section('content')
    <h2>Instructions:</h2>
    <ul>
        <li>There are two players; you play as Evens, the CPU plays as Odds. Both start with 5 coins.</li>
        <li>Each round, you will take one of your coins from your coin pool and secretly select a coin face (heads or
            tails).</li>
        <li>The players then reveal their coins. If both are the same face (Heads/Heads or Tails/Tails), Evens wins and
            takes a coin from Odds.</li>
        <li>If the coins are different faces (Heads/Tails), Odds wins and takes a coin from Evens.</li>
        <li>The first player to win all of their opponent's coins wins.</li>
    </ul>

    <!-- Player is set to Evens for proof-of-concept for completion. -->
    <h2>You are playing as Evens! Match faces with the CPU to win the round!</h2>
    <form method='POST' action='/process'>
        <label>What face do you choose for your coin?</label><br>

        <input type="radio" id="heads" name="choice" value="Heads" checked><label for="heads">Heads</label>
        <input type="radio" id="tails" name="choice" value="Tails"><label for="tails">Tails</label>
        <button type='submit'>Show Coins!</button>
    </form>
    <br>

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if ($choice)
        <div class='results'>
            You have played <b><i>{{ $choice }}</i></b>.<br>
            The Computer plays <b><i>{{ $cpuFlip }}</i></b>.<br>

            @if ($won)
                You have <b>won</b> this round! <span class='won'><b>You take a coin from the Computer.</b></span>
            @else
                You have <b>lost</b> this round! <span class='lost'><b>The Computer takes a coin from you.</b></span>
            @endif

            <br>You have <b><i>{{ $playerCoins }} coins remaining</i></b>.<br>
            The Computer has <b><i>{{ $computerCoins }} coins remaining</i></b>.<br>

            @if ($playerCoins === 0)
                <div class="game-over">
                    <span class='lost'><b>Game Over!</b> You have no coins left. You <b>lost</b> the game.</span>
                    <?php
                    session_destroy();
                    session_start();
                    ?>
                </div>
            @elseif ($computerCoins === 0)
                <div class="game-over">
                    <span class='won'><b>Game Over!</b> The Computer has no coins left. You <b>won</b> the game.</span>
                    <?php
                    session_destroy();
                    session_start();
                    ?>
                </div>
            @endif
        </div>
    @else
        <!-- Baseline starting report of initial coin pools. -->
        <br>You have <b>{{ $playerCoins }} coins remaining</b>.<br>
        The Computer has <b>{{ $computerCoins }} coins remaining</b>.<br>
    @endif
    <!-- Restart button, resets coin pools -->
    <div>
        <form method='POST' action='/restart' style="display: inline;">
            <button type='submit'>Press to Restart</button>
        </form>
    </div>

    <a href='/history'>Game History</a>
@endsection
