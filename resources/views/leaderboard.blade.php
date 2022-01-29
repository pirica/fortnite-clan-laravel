@extends('layout') 
@section('title', 'Fortnite Clans Leaderboard')
@section('content')
<div class="row px-1">
    <div id="paralax"
            class="jumbotron mt-3 align-items-center d-flex flex-column justify-content-center leaderboard">
        <h1 class="display-4 text-center text-uppercase px-2 px-sm-5">
            Fortnite Clan Leaderboard
        </h1>
        <h6 class="display-5">
            <strong>Most Voted Fortnite Clans</strong>
        </h6>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-12 px-1">
        <div class="alert alert-success d-flex flex-column mx-0" role="alert">
            <h4 class="alert-heading text-bold text-center mx-auto">Monthly Reset!</h4>
            <p>
                Every month the votes on each clan will be reset to zero. This gives every clan a chance to compete for the top spots. Don't worry! Your members and fans can vote for your clan again! 
            </p>
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th class="text-center" scope="col">Rank</th>
                <th class="text-center" scope="col">Logo</th>
                <th class="text-center" scope="col">Clan</th>
                <th class="text-center" scope="col">Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clans as $clan)
                <tr>
                    <th class="text-center align-middle" scope="row">{{$clan->rank}}</th>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="/clan/{{$clan->slug}}" />
                            <div style="width:50px; height:50px; border:2px solid rgba(255,255,255,0.4); border-radius: 50%; background: url('../images/{{$clan->picture}}'); background-size: auto 50px; background-position: center;"></div>
                        </a>
                    </td>
                    <td class="align-middle">
                        <a href="/clan/{{$clan->slug}}" class="text-decoration-none" />
                            <h6 class="text-center">{{$clan->name}}</h6>
                        </a>
                    </td>
                    <td class="text-center align-middle">{{$clan->total_votes()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center">
    {{ $clans->onEachSide(1)->links() }}
</div>
@endsection