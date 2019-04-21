@extends('layouts.app')


@section('title')
About {{$user->name}} - {{ config('app.name') }}
@endsection

@section('content')
@if(empty($user->photo))

@else
<center>
<img src="/storage/usersphoto/{{$user->photo}}" style="width: 30%;" class="rounded-circle">
</center>
@endif
<h4>About {{$user->name}}</h4><hr>
<p>Name: {{$user->name}}</p><hr>
<p>Email: {{$user->email}}</p><hr>
<p>Joined: {{$user->created_at->diffForHumans()}}</p><hr>

@endsection
