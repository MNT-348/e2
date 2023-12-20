@extends('templates/master')

@section('title')
    Round Details
@endsection

@section('content')
    <h2>Round Details</h2>

    <ul>
        <li>Round ID: {{ $round['id'] }}</li>
        <li>Player's Choice: {{ $round['choice'] }}</li>
        <li>Computer's Choice: {{ $round['cpuFlip'] }}</li>
        <li>Player's Coin Pool: {{ $round['playerCoins'] }}</li>
        <li>Computer's Coin Pool: {{ $round['computerCoins'] }}</li>
        <li>Player {{ $round['won'] ? 'WON' : 'LOST' }} the round.</li>
        <li>Game Winner: {{ $round['winner'] }}</li>
        <li>Timestamp: {{ $round['timestamp'] }}</li>
    </ul>

    <a href='/history'>Return to <b>Round History</b></a>
@endsection
