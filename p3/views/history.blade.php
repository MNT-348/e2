@extends('templates/master')

@section('title')
    Round History
@endsection

@section('content')
    <a href='/'>Return to <b>Homepage</b></a>
    <h2>Round History</h2>
    Click a Round to see details:
    <ul>
        @foreach ($rounds as $round)
            <li>
                <a href='/round?id={{ $round['id'] }}'>{{ $round['timestamp'] }} </a>
                @if ($round['winner'] !== 'None' && !empty($round['winner']))
                    <span class='won'><b>(GAME POINT)</b></span>
                @endif
            </li>
        @endforeach
    </ul>
    <a href='/'>Return to <b>Homepage</b></a>
@endsection
